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


