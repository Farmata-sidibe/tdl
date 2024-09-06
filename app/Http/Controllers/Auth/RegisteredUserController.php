<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Liste;
use App\Models\Cagnotte;

use App\Services\PaymentService;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['sometimes','integer', 'max:10'],
            'avatar' => ['sometimes','text'],
            'country' => ['sometimes','string', 'max:255'],
            'adress' => ['sometimes','text'],
            'code_postal' => ['sometimes','integer', 'max:5'],
            'ville' => ['sometimes','string', 'max:255'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $liste = Liste::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'dateBirth' => $request->dateBirth,
            'partner' => $request->partner,
        ]);

        // Create a new Cagnotte for the new Liste
        $cagnotte = new Cagnotte([
            'total_amount' => 0,
            'current_amount' => 0,
        ]);

        // Créez un compte connecté Stripe pour la liste
        $paymentService = new PaymentService();
        $stripeAccountId = $paymentService->createStripeAccount($user);

        $liste->update(['stripe_account_id' => $stripeAccountId]);

        // Save the new Cagnotte and set the ID of the Liste's cagnotte_id column
        $liste->cagnotte()->save($cagnotte);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);


    }
}
