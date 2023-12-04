<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NagadController extends Controller
{
//    public function showNagadForm()
//    {
//        return view('payment.nagad');
//    }

    public function showNagadForm(Request $request)
    {
        $travelHistory = $request->input('travel_history');
        return view('payment.nagad', compact('travelHistory'));
    }
}
