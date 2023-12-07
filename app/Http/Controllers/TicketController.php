<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Travelhistory;

class TicketController extends Controller
{
    public function showTicket()
    {
        $userId = auth()->id();

        //Fetching user details
        $user = User::findOrFail($userId); // Assuming you have a 'users' table

        //Fetching travel history details from travelhistories table
        $travelHistory = Travelhistory::where('user_id', $userId)
            ->latest()
            ->first();

        return view('view_ticket', ['user' => $user, 'travelHistory' => $travelHistory,]);




    }
}
