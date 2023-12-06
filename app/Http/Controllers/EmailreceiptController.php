<?php

namespace App\Http\Controllers;

use App\Models\Travelhistory;
use App\Models\User;
use App\Notifications\receiptNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailreceiptController extends Controller
{
    public function emailReceipt()
    {
//        // Replace the following with your actual ticket data retrieval logic
//        $userId = auth()->id();
//
//        // Fetch user details
//        $user = User::findOrFail($userId); // Assuming you have a 'users' table
//
//        // Fetch travel history details
//        $travelHistory = Travelhistory::where('user_id', $userId)
//            ->latest()
//            ->first(); // Assuming you have a 'travelhistories' table
//        $user = Auth::user(); // or however you retrieve the user
//        $travelHistory = $user->travelHistory; // adjust this based on your actual relationship
//
//        $user->notify(new receiptNotification($user, $travelHistory));

        // Pass the values to the view ticket page
//        return view('receipt', [
//            'user' => $user,
//            'travelHistory' => $travelHistory,
//        ]);

        $userId = auth()->id();

        // Fetch user details
        $user = User::findOrFail($userId);

        // Fetch travel history details
        $travelHistory = Travelhistory::where('user_id', $userId)
            ->latest()
            ->first();

        // Notify the user
        $user->notify(new receiptNotification($user, $travelHistory));
        return redirect()->back()->with('success', 'Payment receipt sent successfully!');


    }
}


