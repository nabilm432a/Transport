<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function showMasterForm(Request $request)
    {
        $travelHistory = $request->input('travel_history');
        return view('payment.master', compact('travelHistory'));
    }
}
