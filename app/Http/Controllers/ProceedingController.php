<?php

namespace App\Http\Controllers;

use App\Models\Proceeding;
use App\User;
use Illuminate\Http\Request;

class ProceedingController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users = User::where('name', '!=', 'delete user')->get();
    $Proceedings = Proceeding::all();
    return view('dashboards.proceedings', compact('Proceedings', 'users'));
  }
    public function indexApi()
    {
        $Proceedings = Proceeding::all();
        return response()->json($Proceedings);
    }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    if($request->file('fileSooratJalase')){
      $filejalase = $request->file('fileSooratJalase');
      $filejalase = time() . "_" . $fileSooratJalase->getClientOriginalName();

      $fileSooratJalase->move('storage/Mosavvabat', $filejalase);
    }else{
      $filejalase = "nothing";
    }


    if($request->file('fileMostanadat')){
      $fileMostanadat = $request->file('fileMostanadat');
      $fileMostanadatName = time() . "_" . $fileMostanadat->getClientOriginalName();
      $fileMostanadat->move('storage/Mosavvabat', $fileMostanadatName);
    }else{
      $fileMostanadatName = "nothing";
    }


    Proceeding::forceCreate([
      'date' => $request->date,
      'number' => $request->number,
      'MeetingType' => $request->MeetingType,
      'radifeMosavvabe' => $request->radifeMosavvabe,
      'sharheMoavvabe' => $request->sharheMoavvabe,
      'eghdamKonande' => $request->eghdamKonande,
      'mohlateEghdam' => $request->mohlateEghdam,
      'natijeh' => $request->natijeh,
      'fileSooratJalase' => 'storage/Mosavvabat/' . $filejalase,
      'fileMostanadat' => 'storage/Mosavvabat/' . $fileMostanadatName,
    ]
  );


  \Session::flash('updateUser', array(
    'flash_title' => 'انجام شد',
    'flash_message' => 'مصوبه با موفقیت به سیستم اضافه شد.',
    'flash_level' => 'success',
    'flash_button' => 'بستن'
  ));
 return redirect()->back();
}

/**
* Display the specified resource.
*
* @param  \App\Models\Proceeding  $proceeding
* @return \Illuminate\Http\Response
*/
public function show(Proceeding $proceeding)
{
  //
}

/**
* Show the form for editing the specified resource.
*
* @param  \App\Models\Proceeding  $proceeding
* @return \Illuminate\Http\Response
*/
public function edit(Proceeding $proceeding)
{
  //
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Models\Proceeding  $proceeding
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Proceeding $proceeding)
{
  //
}

/**
* Remove the specified resource from storage.
*
* @param  \App\Models\Proceeding  $proceeding
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  $Proceeding = Proceeding::findOrFail($id);
  $Proceeding->delete();

  \Session::flash('updateUser', array(
    'flash_title' => 'انجام شد',
    'flash_message' => 'مصوبه با موفقیت از سیستم حذف شد.',
    'flash_level' => 'success',
    'flash_button' => 'بستن'
  ));

  return redirect()->back();

}
}
