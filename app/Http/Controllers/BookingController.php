<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Travel;
use App\Models\Seats;
use App\Models\Travelhistory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
#use App\Booking;


class BookingController extends Controller
{
    public function index()
    {
        $travels = Travel::all();
        return view('Bookings.booking', compact('travels'));
    }

    public function book(Travel $travel)
    {

        $user_id = auth()->id();
        $mode = $travel->transport_mode;
        $fare = 0;
        if($mode == 'airplane')
           $fare= $travel-> airRoute->fare;
        elseif($mode == 'bus')
            $fare= $travel-> busRoute->fare;
        elseif($mode == 'rail')
            $fare= $travel-> railRoute->fare;

        Travelhistory::create([
            'user_id' =>  $user_id,
            'travel_id' => $travel->id,
            'final_price' =>$fare,
            'payement_status' => 'No',
        ]);

        $travelseats = Travel::find($travel->id);
        $travelseats->increment('booked_seats');

        return redirect()->route('Bookings');
    }



}
