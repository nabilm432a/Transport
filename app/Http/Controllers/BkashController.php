<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BkashController extends Controller
{
    public function showBkashForm()
    {
        return view('payment.bkash');
    }
//    public function processPayment()
//    {
//        return view('payments.bkash.payment');
//    }


//    public function processPayment(Request $request)
//    {
//        // Add payment processing logic here
//        // This is where you would integrate with a payment gateway
//        // For example, you might use Stripe, PayPal, etc.
//
//        return redirect()->route('payment.success');
//    }
//
//    public function paymentSuccess()
//    {
//        return view('payment_success');
//    }
}

