<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\User;
use App\Policies\UserPolicy;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AvatarRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){

     }

    public function index(Request $request)
    {
      if (Gate::denies('administrator')) {
          $request->session()->flash('permissionDenied', array(
          'flash_title' => 'Inconceivable!',
          'flash_message' => 'You don\'t have permission to this section',
          'flash_level' => 'error',
        ));
        return redirect()->back();

      }

        $users = User::where('name' , '!=', 'delete user')->get();
        return view('users', compact('users'));

  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {

      User::create([
        'name' => $request->name,
        'nationalCode' => $request->nationalCode,
        'family' => $request->family,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'groupName' => $request->groupName,
        'position' => $request->position,
        'mobileNumber' => $request->mobileNumber,
        'isAdmin' => $request->isAdmin,
        'isDataEntry' => $request->isDataEntry,
        'Active' => $request->Active,
        'isDefaulPassword' => 1,

      ]);

      \Session::flash('updateUser', array(
        'flash_title' => 'Seccessfully',
        'flash_message' => 'User Created Successfully',
        'flash_level' => 'success',
        'flash_button' => 'Okay'
      ));

      return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {

      \App\User::where('email', $request->email)
          ->update([
            'name' => $request->name,
            'family' => $request->family,
            'nationalCode' => $request->nationalCode,
            'email' => $request->email,
            'groupName' => $request->groupName,
            'position' => $request->position,
            'mobileNumber' => $request->mobileNumber,
            'isAdmin' => $request->isAdmin,
            'isDataEntry' => $request->isDataEntry,
            'Active' => $request->Active,
          ]);

      \Session::flash('updateUser', array(
        'flash_title' => 'Seccessfully',
        'flash_message' => 'User Updated Successfully',
        'flash_level' => 'success',
        'flash_button' => 'Okay'
      ));
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return redirect()->back();

    }


      public function profileIndex(){
        $user = User::find(\Auth::user()->id);
        return view('dashboards.profile', compact('user'));
      }

      public function updateInformation(Request $request){

        $user = User::find(\Auth::user()->id);
        $user->name = $request->name;
        $user->family = $request->family;
        $user->mobileNumber = $request->mobileNumber;
        $user->save();

        \Session::flash('updateUser', array(
          'flash_title' => '?????????? ????',
          'flash_message' => '?????????????? ???????? ???????????? ???? ???????????? ???????? ????.',
          'flash_level' => 'success',
          'flash_button' => '????????'
        ));
        return redirect()->back();

      }


      public function updatePassword(Request $request){

        $user = User::find(\Auth::user()->id);
        $password = bcrypt($request->password);
        $user->password = $password;
        $user->save();

        \Session::flash('updateUser', array(
          'flash_title' => '?????????? ????',
          'flash_message' => '?????? ???????? ???? ???????????? ?????????? ??????.',
          'flash_level' => 'success',
          'flash_button' => '????????'
        ));
        return redirect()->back();

      }


      public function updateAvatar(AvatarRequest $request){

        $avatarFile = $request->file('avatar');
        $avatarFileName = time() . "_" . $avatarFile->getClientOriginalName();
        $avatarFile->move('storage/Avatars', $avatarFileName);

        $user = User::find(\Auth::user()->id);
        $user->avatar = 'storage/Avatars/' . $avatarFileName;
        $user->save();

        \Session::flash('updateUser', array(
          'flash_title' => '?????????? ????',
          'flash_message' => '?????????? ?????????????? ???? ???????????? ???????? ????',
          'flash_level' => 'success',
          'flash_button' => '????????'
        ));
        return redirect()->back();

      }

}
