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
        // profile edit user if admin and if not admin
        if (Auth::user()->is_admin) {
            $user = Auth::user();
            return view('admin.users.edit', compact('user'));
        } else {
            $user = $request->user();
            $liste = $user->listes()->first();

            return view('profile.edit', [
                'user' => $user,
                'liste' => $liste,
            ]);
        }


    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // update user if admin and if not admin
        if (Auth::user()->is_admin) {
            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();

            return Redirect::route('admin.users.edit')->with('status', 'profile-updated');
        }else{
            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }


    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // destroy user if admin and if not admin
        if (Auth::user()->is_admin) {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/admin');
        }else{
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
}
