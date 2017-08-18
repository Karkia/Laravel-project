<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\AddMaster;
use Carbon\Carbon;
use App\Booking;
use App\User;
use App\Users;
use App\Masters;

class PagesController extends Controller
{
    public function index(){
    	return view('pages.home');
    }

    public function main() {
        if (\Auth::check()) {

          $id = \Auth::id();
          $masters = AddMaster::all();
          $today = Carbon::now()->format('Y-m-d H:i:s');
          $user = User::find(\Auth::id());
          $services = Admin::all();


          return view('pages.main', compact('services', 'user', 'masters', 'today', 'bookings', 'id'));
      } else {
        return \Redirect::to('/');
      };
    }

    public function admin() {
      $user = User::find(\Auth::id());
      $bookings = Booking::all();
      $bookings = Booking::orderBy('time', 'ASC')->get();
      $peoples = Users::all();
      $services = Admin::all();
      $today = Carbon::now()->format('Y-m-d H:i:s');
      $masters = Masters::all();
      if (\Auth::check()) {
      if($user->admin == 1) {
            return view('pages.admin', compact('user', 'bookings', 'services', 'today', 'peoples', 'masters'));
        } else {
          return \Redirect::to('/main');
        }
      } else {
        return \Redirect::to('/main');
    }
  }
}
