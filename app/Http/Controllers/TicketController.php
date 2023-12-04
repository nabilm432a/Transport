<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Travelhistory;

class TicketController extends Controller
{
    public function showTicket()
    {
//         Replace the following with your actual ticket data
//        $data = [
//            'flight' => 'Flight ABC123',
//            'date' => '2023-12-31',
//            'departure' => 'Airport A',
//            'destination' => 'Airport B',
//            'boardingTime' => '12:00 PM',
//            'ticketCode' => 'ABCDE12345',
//            'seat' => '12A',
//            'price' => '$150',
//        ];
//
//        return view('view_ticket', $data);
//        return view("view_ticket");
        // Replace the following with your actual ticket data retrieval logic
        $userId = auth()->id();

        // Fetch user details
        $user = User::findOrFail($userId); // Assuming you have a 'users' table

        // Fetch travel history details
        $travelHistory = Travelhistory::where('user_id', $userId)
            ->latest()
            ->first(); // Assuming you have a 'travelhistories' table

        // Pass the values to the view ticket page
        return view('view_ticket', [
            'user' => $user,
            'travelHistory' => $travelHistory,
        ]);




    }
}
