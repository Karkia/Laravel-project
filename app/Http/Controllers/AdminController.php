<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\AddMaster;
use App\Booking;
use Carbon\Carbon;
use App\Users;
use App\Masters;

class AdminController extends Controller
{
    public function add(Request $request) {
      if (isset($request ->add)) {
        $add = new Admin();

        $service = $request ->service;
        $price = $request ->price;

        $add ->service = $service;
        $add ->price = $price;

        $add ->save();

        return \Redirect::to('/admin');

       }
     }

     public function addmasters(Request $request) {
       if (isset($request ->submit)) {
         $add = new AddMaster();

         $firstname = $request->firstname;
         $lastname = $request->lastname;

         $add ->firstname = $firstname;
         $add ->lastname = $lastname;

         $add ->save();

         return \Redirect::to('/admin');
       }
     }
}
