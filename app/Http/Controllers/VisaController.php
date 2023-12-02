<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function showVisaForm()
    {
        return view('payment.visa');
    }
}
