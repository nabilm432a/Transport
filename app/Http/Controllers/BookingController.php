<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Travel;
use App\Models\Seats;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
#use App\Booking;


class BookingController extends Controller
{
    public function index()
    {
        $air_routes = Travel::where('transport_mode' , '=', "airplane")
            ->where('booked_seats', '<', 'total_seats')
            ->get()
            ->groupBy(function ($air_routes) {
                return Carbon::parse($air_routes->departure_time)->format('d-m-Y');
            });
        $travels = Travel::all();
        return view('Bookings.booking', compact('travels'));
    }



}
