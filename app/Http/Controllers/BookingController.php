<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Choices;

class BookingController extends Controller
{
    public function booking(Request $request) {
      if (isset($request ->Registruotis)) {

        $id = \Auth::id();
        $serviceTimes = DB::table('bookings')->select('time')->get();
        $booking = new Booking();

        $master = $request->master;
        $procedures = $request->procedure;
        $date = $request ->date;
        $date1 = $request ->date1;
        $final_date = $date.' '.$date1. ':00';

        $this->validate($request, [
          "master" => "required",
          "procedure" => "required",
          "date" => "required",
          "date1" => "required",
        ]);

        $proc_str = "";
        $total = 0;
        foreach ($procedures as $key => $procedure) {

            $proc_str .= $procedure;
            $add = Choices::where('service', $procedure)->first();
            $prc = $add->price;
            $total += intval($prc);

            if($key != count($procedures) - 1)

              $proc_str .= ', ';
        }

        $finaldate = date('Y-m-d H:i:s', strtotime($final_date));

        //dar nlb veikia if
        if ($final_date != $serviceTimes) {
          $booking ->specialist =$master;
          $booking ->procedure = htmlspecialchars($proc_str);
          $booking ->time = $final_date;
          $booking ->user_id = $id ;
          $booking ->price =$total;

          $booking->save();

          return \Redirect::to('/main');
        } else {
          return \Redirect::to('/main')->withErrors([
            'error' => 'Šis laikas jau užimtas',
        ]);
        }
      }
    }
}
