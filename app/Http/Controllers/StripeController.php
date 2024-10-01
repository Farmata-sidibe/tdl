<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use App\Models\Participant;
use App\Models\Cagnotte;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;


class StripeController extends Controller
{
    protected $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function onboardUser(Request $request)
    {
        $user = Auth::user();
        $accountId = $this->paymentService->createStripeAccount($user);
        $link = $this->paymentService->createAccountLink($accountId);

        return redirect($link->url);
    }


    public function onboardReturn(Request $request)
    {
        // Handle what happens after the user returns from Stripe onboarding
        return redirect()->route('home')->with('success', 'You have successfully onboarded with Stripe.');
    }

    public function onboardRefresh(Request $request)
    {
        // Generate a new account link if the previous one expired
        $user = Auth::user();
        $accountId = $user->stripe_account_id;
        $link = $this->paymentService->createAccountLink($accountId);

        return redirect($link->url);
    }

    public function contributeToList(Request $request)
    {
        $liste = Liste::find($request->liste_id);
        $amount = $request->amount;
        $paymentMethodId = $request->payment_method_id;

        $result = $this->paymentService->contributeToList($liste, $amount, $paymentMethodId);

        if ($result['status'] === 'error') {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('home')->with('success', 'Contribution successful!');
    }

    public function payout(Request $request)
    {
        $user = Auth::user();
        $accountId = $user->stripe_account_id;
        $amount = $request->amount * 100; // Convert to cents

        $result = $this->paymentService->makePayout($accountId, $amount);

        if ($result['status'] === 'error') {
            return back()->with('error', $result['message']);
        }

        return redirect()->route('home')->with('success', 'Payout successful!');
    }


    public function checkout()
    {
        return view('liste.showBySlug');
    }

    public function checkoutPost(Request $request, Liste $liste)
    {
        $cagnotte = $liste->cagnotte()->first();
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

         // Store participant information in the database
         Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'date_contribution' => now(),
            'liste_id' => $liste->id,
        ]);
        $cagnotte->current_amount += $request->amount;
        $cagnotte->save();

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
