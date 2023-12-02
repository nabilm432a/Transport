<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rail;  // Import your Rail model
class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }
    public function processPayment(Request $request)
    {


// ...

// Assuming 'id' is the primary key column in your 'rails' table
//        $rail = Rail::find(session('id'));
//
//        if ($rail) {
//            $rail->capacity = $rail->capacity - 1;
//            $rail->save();
//        }
        return redirect()->route('finalPage');

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
