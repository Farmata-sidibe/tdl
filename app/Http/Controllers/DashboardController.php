<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Liste;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Account;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request )
    {
        $request->merge(['user_id' => Auth::id()]);
        $user = Auth::user();
        // $liste = Liste::find($request->all());
        $liste = $request->user()->listes()->first();
        $cagnotte = $liste->cagnotte()->first();


        $total = 0;

        if ($liste && $liste->products->count() > 0) {
            foreach ($liste->products as $product) {
                $total += floatval(str_replace(',', '.', str_replace('€', '', $product['price'])));
            }
        }

        $total_amount = $cagnotte->total_amount ?? 0;
        $total_amount = $total;
        $current_amount = $cagnotte->current_amount ?? 0;
        $percentage = $total_amount > 0 ? ($current_amount / $total_amount) * 100 : 0;

        return view('dashboard', compact('user', 'liste', 'total', 'total_amount', 'current_amount','percentage' ));
    }

    public function indexListe(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $user = Auth::user();
        // $liste = Liste::find($request->all());
        $liste = $request->user()->listes()->first();
        // dd($liste);
        return view('layouts.navigation', compact('liste', 'user'));
    }

    public function createConnectedAccount($user)
        {
            Stripe::setApiKey(config('stripe.secret'));

            $account = Account::create([
                'type' => 'express',
                'country' => 'FR',
                'email' => $user->email,
            ]);

            $user->stripe_account_id = $account->id;
            $user->save();

            return $account;
        }

    public function addProductWish(Request $request, $title)
    {
        $user = Auth::user();
        $liste = Liste::firstOrCreate(['user_id' => $user->id]);

        // Check if the product is already in the list
        if ($liste->products()->wherePivot('title', $title)->exists()) {
            return redirect()->route('dashboard')->with('error', 'Le produit est déjà dans la liste de naissance');
        }

        // Fetch product details from the API
        $response = Http::get("http://localhost:8080/all", ['name' => $title]);

        if ($response->successful()) {
            $data = $response->json();
            $productData = collect($data['data']['others'])
                            ->concat($data['data']['biberons'])
                            ->concat($data['data']['modes'])
                            ->concat($data['data']['poussettes'])
                            ->concat($data['data']['rooms'])
                            ->concat($data['data']['eveils'])
                            ->concat($data['data']['allaitements'])
                            ->firstWhere('title', $title);

            if (!isset($productData['title'])) {
                return redirect()->back()->withErrors(['error' => 'Le titre du produit est requis']);
            }

            // Vérifier l'existence de chaque clé et appliquer les transformations nécessaires
            if (isset($productData['price'])) {
                $productData['price'] = str_replace([' ', '€'], '', $productData['price']); // Removing spaces and currency symbol
                $productData['price'] = (float) $productData['price'];
            } else {
                $productData['price'] = 0; // Définit un prix par défaut si non fourni
            }

            // Vérifier et gérer les tailles si elles sont présentes
            if (isset($productData['size']) && is_array($productData['size'])) {
                $productData['size'] = json_encode($productData['size']);
            } else {
                $productData['size'] = null; // Définit une taille par défaut si non fournie
            }

            // Vérifier l'existence des autres clés et définir des valeurs par défaut si nécessaire
            $productData['brand'] = $productData['brand'] ?? '';
            $productData['img'] = $productData['img'] ?? '';
            $productData['link'] = $productData['link'] ?? '';

            if ($productData) {
                $productRecord = Product::firstOrCreate(
                    ['title' => $productData['title']],
                    [
                        'brand' => $productData['brand'] ?? 'Unknown',
                        'price' => $productData['price'] ?? '0.00',
                        'size' => $productData['size'] ?? 'N/A',
                        'img' => $productData['img'] ?? 'default.jpg',
                        'link' => $productData['link'] ?? '#',
                    ]
                );

                // dd($productRecord);

                try {
                    $liste->products()->attach($productRecord->id, [
                        'title' => $productData['title'],
                        'price' => $productData['price'],
                        'size' => $productData['size'] ?? 'N/A',
                        'img' => $productData['img'],
                        'link' => $productData['link']
                    ]);

                    return redirect()->route('dashboard')->with('success', 'Produit ajouté à la liste de naissance');
                } catch (\Exception $e) {
                    return redirect()->route('dashboard')->with('error', 'Erreur lors de l\'ajout du produit à la liste de naissance');
                }
            } else {
                return redirect()->route('dashboard')->with('error', 'Produit non trouvé dans l\'API');
            }
        } else {
            return redirect()->route('dashboard')->with('error', 'Erreur lors de la récupération du produit de l\'API');
        }
    }

    public function deleteProductWish(Request $request){

        $user = Auth::user();
        $title = $request->input('title');

        // Récupérer la liste de naissance de l'utilisateur
        $liste = Liste::where('user_id', $user->id)->first();

        if (!$liste) {
            return redirect()->route('product')->with('error', 'Liste de naissance non trouvée');
        }

        // Vérifier si le produit existe dans la liste
        $product = $liste->products()->wherePivot('title', $title)->first();

        if (!$product) {
            return redirect()->route('product')->with('error', 'Produit non trouvé dans la liste');
        }

        // Détacher le produit de la liste de naissance
        $liste->products()->detach($product->id);

        // return redirect()->route('liste.index')->with('success', 'Produit supprimé de la liste de naissance');

        return redirect()->route('dashboard')->with('success', 'Produit supprimé de la liste de naissance');
    }



}
