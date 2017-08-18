<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Registration;
  use Illuminate\Foundation\Auth\AuthenticatesUsers;
  use App\Admin;
  use App\AddMaster;
  use Carbon\Carbon;
  use App\Booking;
  use App\User;

  class MainController extends Controller
  {
    public function __construct() {
  }

  public function logout() {
    \Auth::logout();
    return \Redirect::to('/');
  }

  public function register(Request $request) {

    if (isset($request ->register)) {
      $registration = new Registration();

      $this->validate($request, [
        "firstname" => "required|min:3",
        "lastname" => "required|min:3",
        "email" => "required|email|unique:users",
        "password" => "required|regex:/^.*(?=.{3,})(?=.*[a-z]).*$/",
        "confirmed_password" => 'required|same:password',
      ]);

      $firstname = $request ->firstname;
      $lastname = $request ->lastname;
      $email = $request->email;
      $password = \Hash::make($request->password) ;
      $admin = 0;
      $remember_token = 0;

      $registration ->firstname = $firstname;
      $registration ->lastname = $lastname;
      $registration ->email = $email;
      $registration ->password = $password;
      $registration ->admin = $admin;
      $registration ->remember_token = $remember_token;

      $registration->save();

      return \Redirect::to('/');
    }
  }



  public function login_in(Request $request) {


    if (\Auth::attempt(['email'=> $request->email, 'password' => $request->password],true)) {
      $user = User::find(\Auth::id());
      if ($user->admin == 1) {
        return \Redirect::to('/admin');
      } else {
        return \Redirect::to('/main');
      }
    }
    else {
      return redirect('/')->withErrors([
        'error' => 'Tokio vartotojo nėra',
    ]);

    }
  }

}
