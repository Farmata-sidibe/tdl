<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ListeRequest;
use App\Models\Cagnotte;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $liste = new Liste();
        $cagnotte = new Cagnotte();
        $userId = Auth::id();

        return view('liste.create', compact('liste', 'userId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListeRequest $request): RedirectResponse
    {
        $request->merge(['user_id' => Auth::id()]);

        // Create a new Liste object with the validated data, but don't save it yet
        $liste = Liste::create($request->all());

        // Create a new Cagnotte for the new Liste
        $cagnotte = new Cagnotte([
            'total_amount' => 0,
            'current_amount' => 0,
        ]);

        // Save the new Cagnotte and set the ID of the Liste's cagnotte_id column
        $liste->cagnotte()->save($cagnotte);

        return Redirect::route('dashboard')
            ->with('success', 'Liste created successfully.');
    }


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
}
