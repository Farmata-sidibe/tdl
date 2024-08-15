<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use App\Models\Participant;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('liste.showBySlug');
    }

    public function checkoutPost(Request $request, Liste $liste)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Contribution',
                    ],
                    'unit_amount' => $request->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
            'customer_email' => $request->email,
            'metadata' => [
                'liste_id' => $liste->id,
            ],
        ]);

        return redirect($session->url, 303);
    }

    public function success()
    {
        return view('success');
    }

    public function cancel()
    {
        return view('cancel');
    }
}
