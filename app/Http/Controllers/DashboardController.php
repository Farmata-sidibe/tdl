<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Liste;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $user= Auth::user();
        // $liste = Liste::find($request->all());
        $liste = $request->user()->listes()->first();

        // dd($liste);
        return view('dashboard', ['user' => $user, 'liste'=> $liste]);
    }

    public function indexListe(Request $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $user= Auth::user();
        // $liste = Liste::find($request->all());
        $liste = $request->user()->listes()->first();
        // dd($liste);
        return view('blog', ['user' => $user, 'liste'=> $liste]);
    }

    // public function show($id): View
    // {
    //     $liste = Liste::find($id);

    //     return view('liste.show', compact('liste'));
    // }
}
