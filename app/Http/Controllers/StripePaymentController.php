<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }


    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
            "amount" => $request->bet * 100,
            "currency" => "BGN",
            "source" => $request->stripeToken,
            "description" => "Payment from SJ Auction."
        ]);
        $username = auth()->user()->name;
        $itemName = $request->itemName;
        $amount = $request->bet * 100;

        Session::flash('success', 'CONGRATULATIONS, Payment successful!');

        //return back();
       // return redirect()->route('items.index')->with('success', 'CONGRATULATIONS, YOU WON');
        return view('success-payment')->with([ 'username' => $username, 'itemName' => $itemName, 'amount' => $amount ]);
    }
}
