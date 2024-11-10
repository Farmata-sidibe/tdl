<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Liste;
use App\Models\ListeProduct;
use App\Models\Product;

use App\Notifications\ReservationNotification;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'liste_id' => 'required|exists:listes,id',
            'visitor_name' => 'required|string|max:255',
            'visitor_email' => 'required|email|max:255',
        ]);

        $reservation = Reservation::create([
            'product_id' => $request->product_id,
            'liste_id' => $request->liste_id,
            'visitor_name' => $request->visitor_name,
            'visitor_email' => $request->visitor_email,
            'due_date' => now(),
        ]);

        // Marquer le produit comme réservé
        $ListeProduct = ListeProduct::where('product_id', $request->product_id)
            ->where('liste_id', $request->liste_id)
            ->first();
        $ListeProduct->reserved = true;
        $ListeProduct->save();

        $Product = Product::where('id', $request->product_id)
            ->first();
        $Product->reserved = true;
        $Product->save();

        $liste = Liste::find($request->liste_id);

        // Envoi de l'email de notification au réservateur
        Notification::route('mail', $request->visitor_email)
            ->notify(new ReservationNotification($reservation));

        // Envoi de l'email de notification au propriétaire de la liste

        Notification::route('mail', $liste->user->email)
            ->notify(new ReservationNotification($reservation));

        return redirect()->back()->with('success', 'Produit réservé avec succès.');
    }
}
