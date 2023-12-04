<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisaController extends Controller
{

    public function showVisaForm(Request $request)
    {
        $travelHistory = $request->input('travel_history');
        return view('payment.visa', compact('travelHistory'));
    }
}
