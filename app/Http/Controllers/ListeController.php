<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ListeRequest;
use App\Models\Cagnotte;
use App\Models\Participant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ListeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $listes = Liste::paginate();

        return view('liste.index', compact('listes'))
            ->with('i', ($request->input('page', 1) - 1) * $listes->perPage());
    }

    // public function indexListe(Request $request)
    // {
    //     $request->merge(['user_id' => Auth::id()]);
    //     $user = Auth::user();
    //     // $liste = Liste::find($request->all());
    //     $liste = $request->user()->listes()->first();
    //     // dd($liste);
    //     return view('layouts.navigation', compact('liste', 'user'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(): View
    // {
    //     $liste = new Liste();
    //     $cagnotte = new Cagnotte();
    //     $userId = Auth::id();

    //     return view('liste.create', compact('liste', 'userId'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(ListeRequest $request): RedirectResponse
    // {
    //     $request->merge(['user_id' => Auth::id()]);

    //     // Create a new Liste object with the validated data, but don't save it yet
    //     $liste = Liste::create($request->all());

    //     // Create a new Cagnotte for the new Liste
    //     $cagnotte = new Cagnotte([
    //         'total_amount' => 0,
    //         'current_amount' => 0,
    //     ]);

    //     // Créez un compte connecté Stripe pour la liste
    //     $paymentService = new PaymentService();
    //     $stripeAccountId = $paymentService->createStripeAccount(auth()->user());

    //     $liste->update(['stripe_account_id' => $stripeAccountId]);

    //     // Save the new Cagnotte and set the ID of the Liste's cagnotte_id column
    //     $liste->cagnotte()->save($cagnotte);

    //     return Redirect::route('dashboard')
    //         ->with('success', 'Liste created successfully.');
    // }

    // Rechercher la liste par l'UUID
    // $liste = Liste::where('uuid', $uuid)->firstOrFail();
    // $liste = Liste::where('uuid', $uuid)->with('user')->firstOrFail();
    // $cagnotte = $liste->cagnotte()->first();
    // $user = $liste->user()->first();

    // if (!$liste) {
    //     return redirect()->route('home')->with('error', 'Liste non trouvée');
    // }
    // $total = 0;

    // if ($liste && $liste->products->count() > 0) {
    //     foreach ($liste->products as $product) {
    //         $total += floatval(str_replace(',', '.', str_replace('€', '', $product['price'])));
    //     }
    // }

    // // Calculer la somme totale des contributions et l'objectif de collecte
    // $current_amount = $cagnotte->current_amount;
    // $total_amount = $total; // Remplacez par l'objectif réel de votre collecte
    // $percentage = $total_amount > 0 ? ($current_amount / $total_amount) * 100 : 0;
    // // return view('liste.showBySlug', compact('liste', 'current_amount', 'total_amount'));
    // return view('liste.showBySlug', ['liste' => $liste, 'current_amount' => $current_amount, 'total_amount' => $total_amount, 'user' => $user, 'percentage' => $percentage]);

    public function showBySlug($uuid)
    {
        $liste = Liste::where('uuid', $uuid)->with('user', 'cagnotte', 'products')->firstOrFail();
        $user = $liste->user()->first();
        $total = $liste->total_amount;
        $current_amount = $liste->cagnotte->current_amount ?? 0;
        $percentage = $total > 0 ? ($current_amount / $total) * 100 : 0;

        return view('liste.showBySlug', compact('liste', 'current_amount', 'total', 'user', 'percentage'));
    }

    // Méthode pour participer à la cagnotte
    // public function participate(Request $request, $uuid)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'amount' => 'required|numeric|min:1',
    //     ]);

    //     Participant::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'amount' => $request->amount,
    //         'date_contribution' => Carbon::now(),
    //     ]);

    //     $liste = Liste::where('uuid', $uuid)->firstOrFail();
    //     $cagnotte = $liste->cagnotte();
    //     $cagnotte->update(['current_amount' => $cagnotte->current_amount + $request->amount]);

    //     return redirect()->route('liste.showBySlug', $liste->uuid)->with('success', 'Contribution ajoutée avec succès!');
    // }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $liste = Liste::find($id);

        return view('liste.show', compact('liste'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = Auth::user()->id;
        $liste = Liste::find($id);

        return view('liste.edit', compact('liste', 'user'));
    }

    // return view('liste.edit', compact('liste'));
    /**
     * Update the specified resource in storage.
     */
    public function update(ListeRequest $request, Liste $liste): RedirectResponse
    {
        $liste->update($request->validated());

        return Redirect::route('dashboard')
            ->with('success', 'Liste updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Liste::find($id)->delete();

        return Redirect::route('listes.index')
            ->with('success', 'Liste deleted successfully');
    }


    // public function contribute(Request $request, $listeId)
    // {
    //     $request->validate([
    //         'amount' => 'required|numeric|min:1',
    //         'payment_method_id' => 'required|string',
    //     ]);

    //     $liste = Liste::findOrFail($listeId);
    //     $paymentService = new PaymentService();
    //     $result = $paymentService->contributeToList($liste, $request->amount, $request->payment_method_id);

    //     if (isset($result['status']) && $result['status'] === 'error') {
    //         return back()->withErrors(['payment' => $result['message']]);
    //     }

    //     Participant::create([
    //         'name' => Auth::user()->name,
    //         'email' => Auth::user()->email,
    //         'amount' => $request->amount,
    //         'cagnotte_id' => $liste->cagnotte->id,
    //     ]);

    //     $liste->cagnotte()->increment('current_amount', $request->amount);

    //     return back()->with('success', 'Contribution effectuée avec succes');
    // }
}
