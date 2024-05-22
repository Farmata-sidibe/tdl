<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $liste = $user->listes()->first();

        return view('profile.edit', [
            'user' => $user,
            'liste' => $liste,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    // public function updateListe(ListeRequest $request, $id)
    // {
    //     $liste = Liste::findOrFail($id);

    //     if ($liste->user_id != Auth::id()) {
    //         // The liste belongs to a different user, so return a 403 Forbidden response
    //         abort(403);
    //     }

    //     dd($liste);
    //     $validatedData = $request->validated();

    //     $liste->update($validatedData);

    //     return redirect()->route('profile.edit')->with('status', 'liste-updated');
    // }

    // public function listes(Request $request)
    // {
    //     $user = $request->user();
    //     $liste = $user->listes()->first();

    //     return view('profile.edit', [
    //         'user' => $user,
    //         'liste' => $liste,
    //     ]);
    // }


    // public function updateListe(ListeRequest $request, $id)
    // {
    //     $user = Auth::id();
    //     $liste = Liste::find($id);

    //     if (!$liste) {
    //         return response()->json(['message' => 'Liste not found'], 404);
    //     }

    //     if ($liste->user_id !== $user) {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //     }


    //     $liste->update($request->all());

    //     return Redirect::route('profile.edit')->with('status', 'liste-updated');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function editListe(Request $request): View
    // {
    //     $liste = $request->user()->listes()->first();

    //     if (!$liste) {
    //         return Redirect::route('liste.create');
    //     }

    //     return view('profile.edit', ['liste' => $liste]);
    // }



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
