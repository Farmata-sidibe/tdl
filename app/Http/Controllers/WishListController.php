<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Liste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        // $liste = Liste::where('user_id', Auth::id())->with('products')->first();
        // return view('liste.index', compact('liste'));

        $request->merge(['user_id' => Auth::id()]);
        $user= Auth::user();
        // $liste = Liste::find($request->all());
        $liste = $request->user()->listes()->first();

        // dd($liste);
        return view('dashboard', ['user' => $user, 'liste'=> $liste]);
    }

   

    public function addProductWish(Request $request, $title)
    {
        $liste = Liste::firstOrCreate(['user_id' => Auth::id()]);

        // Vérifiez si le produit est déjà dans la liste
        if ($liste->product()->where('liste_product.title', $title)->exists()) {
            return redirect()->route('product', $title)->with('error', 'Le produit est déjà dans la liste de naissance');
        }

        // Récupérez les détails du produit depuis l'API
        $response = Http::get("http://localhost:8080/all", ['name' => $title]);

        if ($response->successful()) {
            $data = $response->json();

            $product = null;
            foreach ($data['data']['others'] as $item) {
                if ($item['title'] === $title) {
                    $product = $item;
                    break;
                }
            }
            if ($product === null) {
                foreach ($data['data']['biberons'] as $item) {
                    if ($item['title'] === $title) {
                        $product = $item;
                        break;
                    }
                }
            }
            // Ajoutez le produit à la liste de naissance (stocker les détails nécessaires)
            if ($product !== null) {
                $liste->product()->attach($title, [
                    'title' => $data['title'],
                    'brand' => $data['brand'],
                    'price' => $data['price'],
                    'size' => $data['size'],
                    'img' => $data['img'],
                    'link' => $data['link']
                ]);
            }

            return view("dashboard");
            // return redirect()->route('wishlist.index')->with('success', 'Produit ajouté à la liste de naissance');
        }

        // return redirect()->route('product', $title)->with('error', 'Produit non trouvé');
        return view("product", compact('title'));

    }
}
