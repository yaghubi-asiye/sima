<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;


  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/dashboard';

    // sudo git push https://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@github.com/persiatc/newRepositorySima.git
    // sudo git push https://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@github.com/asiyeYaghubi/link.git



  /**
  * Create a new controller instance.
  *
  * @return void
  */

  protected function authenticated()
  {
    // Update Last Login TimeStamp In DataBase
    $now = time();
    $user = \Auth::user()->email;
    \DB::update("update users set lastLogin = $now where email = ?", ["$user"]);
  }

  public function __construct()
  {
    // Auth::loginUsingId(6);


   $this->middleware('guest')->except('logout');
  }

  public function username()
  {
    return 'email';
  }


}
