<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NagadController extends Controller
{

    public function showNagadForm(Request $request)
    {
        $travelHistory = $request->input('travel_history');
        return view('payment.nagad', compact('travelHistory'));
    }
}
