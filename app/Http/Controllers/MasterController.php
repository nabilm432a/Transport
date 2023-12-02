<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function showMasterForm()
    {
        return view('payment.master');
    }
}
