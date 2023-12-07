<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BkashController extends Controller
{
    public function showBkashForm(Request $request)
    {
        $travelHistory = $request->input('travel_history');
        return view('payment.bkash', compact('travelHistory'));
    }

}

