<?php

namespace App\Http\Controllers;

use App\Models\Travelhistory;
use App\Models\User;
use Illuminate\Http\Request;

class EmailreceiptController extends Controller
{
    public function emailReceipt()
    {
        // Replace the following with your actual ticket data retrieval logic
        $userId = auth()->id();

        // Fetch user details
        $user = User::findOrFail($userId); // Assuming you have a 'users' table

        // Fetch travel history details
        $travelHistory = Travelhistory::where('user_id', $userId)
            ->latest()
            ->first(); // Assuming you have a 'travelhistories' table

        // Pass the values to the view ticket page
        return view('email_receipt', [
            'user' => $user,
            'travelHistory' => $travelHistory,
        ]);

    }
}


