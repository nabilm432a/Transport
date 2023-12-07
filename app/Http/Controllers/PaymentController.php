<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rail;
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

        //initial points update
        $user = auth()->user(); // Get the authenticated user
        $user->points += 10; // Increment points by 10
        $user->save();


        $userId = $user->id;
        $travelHistories = TravelHistory::where('user_id', $userId)->where('payment_status', 'Not Paid')->get();

        foreach ($travelHistories as $travelHistory) {
            $travelHistory->update(['payment_status' => 'Paid']);


            #new
            //discount calculation
            if ($user->points >= 100) {

                $discountedPrice = $travelHistory->final_price * 0.7;
                $travelHistory->update(['final_price' => $discountedPrice]);

                //points update after discount
                $user->points -= 50;
                $user->save();
            }
            #end




        }



        $userAttributes = $user->attributesToArray();


        return redirect()->route('finalPage', compact('userAttributes'));

    }

    public function finalPage()
    {

        return view('final_payment');
    }


    public function paymentSuccess()
    {
        return view('payment_success');
    }
}
