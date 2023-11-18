<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $notices = Notice::all();
        return view('dashboard', compact('notices'));
    }
}
