<?php

namespace App\Http\Controllers;



use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;



class CagnotteController extends Controller
{
    /**
     * Display a cagnotte of the resource.
     */
    public function index(Request $request): View
    {

        $request->merge(['user_id' => Auth::id()]);
        $user= Auth::user();
        $liste = $request->user()->listes()->first();
        $cagnotte = $liste->cagnotte()->first();

        // dd($liste);
        return view('cagnotte.cagnotte', ['liste' => $liste, 'cagnotte'=> $cagnotte, 'user' => $user]);
    }

    public function active(Request $request): View
    {

        $request->merge(['user_id' => Auth::id()]);
        $user= Auth::user();
        $liste = $request->user()->listes()->first();
        $cagnotte = $liste->cagnotte()->first();


        // dd($liste);
        return view('cagnotte.active-cagnotte', ['liste' => $liste, 'cagnotte'=> $cagnotte, 'user' => $user]);
    }

}
