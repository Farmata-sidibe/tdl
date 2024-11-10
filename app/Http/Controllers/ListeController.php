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

    public function showBySlug($uuid)
    {
        $liste = Liste::where('uuid', $uuid)->with('user', 'cagnotte', 'products')->firstOrFail();
        $user = $liste->user()->first();
        $total = $liste->total_amount;
        $current_amount = $liste->cagnotte->current_amount ?? 0;
        $percentage = $total > 0 ? ($current_amount / $total) * 100 : 0;

        return view('liste.showBySlug', compact('liste', 'current_amount', 'total', 'user', 'percentage'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $liste = Liste::find($id);

        // return view('liste.show', compact('liste'));
        return view('admin.listes.index', compact('liste'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = Auth::user()->id;
        $liste = Liste::find($id);

        // return view('liste.edit', compact('liste', 'user'));
        return view('admin.listes.edit', compact('liste', 'user'));
    }

    // return view('liste.edit', compact('liste'));
    /**
     * Update the specified resource in storage.
     */
    public function update(ListeRequest $request, Liste $liste): RedirectResponse
    {
        $liste->update($request->validated());

        return Redirect::route('admin.dashboard')
            ->with('success', 'Liste updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        // function destroy liste is admin and if not admin
        if (Auth::user()->is_admin) {
            $liste = Liste::find($id);
            $liste->delete();
            return Redirect::route('admin.dashboard')
                ->with('success', 'Liste deleted successfully');
        } else {
            return Redirect::route('dashboard')
                ->with('error', 'You are not authorized to delete this liste');
        }

    }
}
