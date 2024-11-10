<?php

namespace App\Http\Controllers;



use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Liste;
use App\Notifications\ContributionNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;
use App\Services\PayPalService;


use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\Reservation;

use App\Models\Cagnotte;
use App\Services\PayPalClient;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use PayPal\Api\FlowConfig;



class CagnotteController extends Controller
{
    /**
     * Display a cagnotte of the resource.
     */
    protected $paypalService;

    public function __construct(PayPalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }


    public function index(Request $request): View
    {

        $request->merge(['user_id' => Auth::id()]);
        $user = Auth::user();
        $liste = $request->user()->listes()->first();
        $cagnotte = $liste->cagnotte()->first();

        return view('cagnotte.cagnotte', ['liste' => $liste, 'cagnotte' => $cagnotte, 'user' => $user]);
    }

    public function showBySlug($uuid)
    {
        $liste = Liste::where('uuid', $uuid)->with('user', 'cagnotte', 'products')->firstOrFail();
        $user = $liste->user()->first();

        $total = $liste->cagnotte->total_amount?? 0;
        $current_amount = $liste->cagnotte->current_amount ?? 0;
        $percentage = $total > 0 ? ($current_amount / $total) * 100 : 0;



        // $participants = Participant::where("status", "paid")->get();
        $participants = Participant::where('status', 'paid')
        ->where('cagnotte_id', $liste->cagnotte->id)
        ->get();
        // $participants = Participant::all();
        $reservations = Reservation::all();

        // Fusionner et trier les deux collections par date
        $historique = $participants->merge($reservations);

        return view('liste.showBySlug', compact('liste', 'current_amount', 'total', 'user', 'percentage', 'historique'));
    }


public function store(Request $request)
{
    $validated = $request->validate([
        'cagnotte_id' => 'required|exists:cagnottes,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'amount' => 'required|numeric|min:1',
        'commission' => 'required|numeric',
    ]);

    $commission = $request->input('commission', 2);
    $totalAmount = $validated['amount'];
    $finalAmount = $totalAmount - $commission;

    $cagnotte = Cagnotte::findOrFail($validated['cagnotte_id']);
    $beneficiary = $cagnotte->liste->user;
    $listeId = $cagnotte->liste;

    if (!$beneficiary->paypal_email) {
        return back()->withErrors('Le bénéficiaire n\'a pas fourni de compte PayPal.');
    }

    $participant = Participant::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'amount' => $finalAmount,
        'commission' => $commission,
        'date_contribution' => now(),
        'cagnotte_id' => $cagnotte->id,
        'status' => 'pending'
    ]);

    // paiement vers la beneficiare
    $payment = $this->paypalService->createPayment(
        $totalAmount,
        "Contribution à la Cagnotte - Une commission de 2€ est déduite de votre contribution de {$validated['amount']}€.",
        route('payment.success', ['listeId' => $listeId, 'participantId' => $participant->id]),
        // route('payment.cancel')
        route('payment.cancel', ['participantId' => $participant->id])

    );

    // Paiement pour la commission
    $paymentForAdmin = $this->paypalService->createPayment(
        $commission,
        "Commission pour la contribution",
        route('payment.success', ['participantId' => $participant->id, 'commission' => 'admin']),
        // route('payment.cancel')
        route('payment.cancel', ['participantId' => $participant->id])
    );

    return redirect($payment->getApprovalLink());
}

public function paymentSuccess(Request $request, $participantId)
{
    $paymentId = $request->query('paymentId');
    $payerId = $request->query('PayerID');
    $commission = $request->query('commission', null);

    if (!$paymentId || !$payerId) {
        return redirect()->route('liste.showBySlug')->withErrors('Payment was not successful.');
    }

    // Execute PayPal payment
    $payment = $this->paypalService->executePayment($paymentId, $payerId);

    if (!$payment) {
        return redirect()->route('liste.showBySlug')->withErrors('Payment execution failed.');
    }


    // Mark participant's contribution as paid
    $participant = Participant::find($participantId);
    Log::info('Participant before update: ', $participant->toArray());

    Log::info('Participant after update: ', $participant->toArray());

    if (!$participant) {
        return redirect()->route('liste.showBySlug')->with('error', 'Participant introuvable.');
    }

    if ($commission === 'admin') {
        Log::info('Commission payée pour l\'administrateur.');
    } else {
        $participant->status = 'paid';
        $participant->save();

        // Mettre à jour la cagnotte
        $cagnotte = Cagnotte::find($participant->cagnotte_id);
        $cagnotte->current_amount += $participant->amount; // Montant net sans commission
        $cagnotte->save();
        $liste = $cagnotte->liste;

        Notification::route('mail', $liste->user->email)
            ->notify(new ContributionNotification($participant));
    }


    return redirect()->route('liste.showBySlug', ['uuid' => $participant->cagnotte->liste->uuid])->with('success', 'Merci pour votre contribution !');
}

public function paymentCancel($participantId)
{
    $participant = Participant::find($participantId);
    Log::info('Payment cancelled');
    // return redirect()->route('liste.showBySlug')->withErrors(['Payment was cancelled.']);
    return redirect()->route('liste.showBySlug', ['uuid' => $participant->cagnotte->liste->uuid])->with('success', 'Merci pour votre contribution !');
}

}
