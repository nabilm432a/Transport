<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rail;  // Import your Rail model
use App\Models\User;
use App\Models\TravelHistory;
class PaymentController extends Controller
{
    public function showPaymentForm($travel_history)

    {
//        $travel_history= $request->input('travel_history');
//        return view('payment', ['travel_history' => $travel_history]);
        return view("payment",compact("travel_history"));
    }
    public function processPayment(Request $request)
    {

        // Assuming you have a 'points' column in your 'users' table
        $user = auth()->user(); // Get the authenticated user
        $user->points += 10; // Increment points by 10
        $user->save();

        // Assuming you have a 'payment_status' column in your 'travelhistories' table
        $userId = $user->id;
        $travelHistories = TravelHistory::where('user_id', $userId)->where('payment_status', 'Not Paid')->get();

        foreach ($travelHistories as $travelHistory) {
            $travelHistory->update(['payment_status' => 'Paid']);


            #new
            // Check if the user has 100 or more points for a discount
            if ($user->points >= 100) {
                // Apply a 30% discount to the final price
                $discountedPrice = $travelHistory->final_price * 0.7;
                $travelHistory->update(['final_price' => $discountedPrice]);

                // Deduct 100 points from the user
                $user->points -= 50;
                $user->save();
            }
            #end




        }


        // Fetch user table's all attributes
        $userAttributes = $user->attributesToArray();


        return redirect()->route('finalPage', compact('userAttributes'));

    }

    public function finalPage()
    {
        // Your final payment page logic...
        return view('final_payment');  // Create a blade view for the final payment page
    }


    public function paymentSuccess()
    {
        return view('payment_success');
    }
}
