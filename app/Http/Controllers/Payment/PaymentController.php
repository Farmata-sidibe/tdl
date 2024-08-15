<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Transfer;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }


    public function transfer(Request $request)
    {
        $transfer = Transfer::create([
            'amount' => $request->amount,
            'currency' => 'eur',
            'destination' => $request->destination
        ]);

        return $transfer;
    }
}
