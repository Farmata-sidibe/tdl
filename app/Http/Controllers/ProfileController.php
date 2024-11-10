<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Liste;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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
     * Update the user's profile information and liste data.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $this->handleImageUpload(
                $request->file('profile_image'),
                $user->profile_image,
                'profile-images',
                'default-profile.jpg'
            );
        }

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $this->handleImageUpload(
                $request->file('cover_image'),
                $user->cover_image,
                'cover-images',
                'default-cover.jpg'
            );
        }


        // Handle email verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Handle liste updates
        $liste = $user->listes()->first();
        if ($liste) {
            $listeData = $request->safe()->only([
                'title',
                'description',
                'dateBirth',
                'partner'
            ]);

            $listeData = array_filter($listeData, function ($value) {
                return !is_null($value);
            });

            if (!empty($listeData)) {
                try {
                    $liste->update($listeData);
                } catch (\Exception $e) {
                    return Redirect::route('profile.edit')
                        ->withErrors(['liste_error' => 'Failed to update liste information.'])
                        ->withInput();
                }
            }
        }

        try {
            // Update user data
            $user->fill($data);
            $user->save();
        } catch (\Exception $e) {
            return Redirect::route('profile.edit')
                ->withErrors(['profile_error' => 'Failed to update profile information.'])
                ->withInput();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Handle image upload and storage
     */
    private function handleImageUpload($image, $oldImage, $directory, $defaultImage): string
    {
        try {
            // Delete old image if it exists and is not the default
            if ($oldImage && $oldImage !== $defaultImage) {
                Storage::disk('public')->delete($oldImage);
            }

            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs($directory, $imageName, 'public');

            return $directory . '/' . $imageName;
        } catch (\Exception $e) {
            throw new \Exception('Failed to upload image: ' . $e->getMessage());
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        try {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();
            $redirectPath = Auth::user()->is_admin ? '/admin' : '/';

            Auth::logout();
            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to($redirectPath);
        } catch (\Exception $e) {
            return Redirect::route('profile.edit')
                ->withErrors(['deletion_error' => 'Failed to delete account.'])
                ->withInput();
        }
    }
}

    // public function updateListe(ListeRequest $request): RedirectResponse
    // {
    //     $user = Auth::user();
    //     $liste = $user->liste;

    //     if ($liste) {
    //         $liste->update($request->validated());
    //         return Redirect::route('profile.edit')->with('status', 'profile-updated');
    //     } else {
    //         return Redirect::route('profile.edit')->withErrors(['message' => 'Liste non trouvée.']);
    //     }
    // }


    // /**
    //  * Update the user's profile information.
    //  */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $user = $request->user();
    //     $data = $request->validated();
    //     $liste = $user->liste;
    //     // Handle profile image upload
    //     if ($request->hasFile('profile_image')) {
    //         // Delete old image if it exists and is not the default
    //         if ($user->profile_image && $user->profile_image !== 'default-profile.jpg') {
    //             Storage::disk('public')->delete($user->profile_image);
    //         }

    //         $profileImage = $request->file('profile_image');
    //         $profileImageName = time() . '_' . $profileImage->getClientOriginalName();
    //         $profileImage->storeAs('profile-images', $profileImageName, 'public');
    //         $data['profile_image'] = 'profile-images/' . $profileImageName;
    //     }

    //     // Handle cover image upload
    //     if ($request->hasFile('cover_image')) {
    //         // Delete old image if it exists and is not the default
    //         if ($user->cover_image && $user->cover_image !== 'default-cover.jpg') {
    //             Storage::disk('public')->delete($user->cover_image);
    //         }

    //         $coverImage = $request->file('cover_image');
    //         $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
    //         $coverImage->storeAs('cover-images', $coverImageName, 'public');
    //         $data['cover_image'] = 'cover-images/' . $coverImageName;
    //     }

    //     $user->fill($data);

    //     if ($user->isDirty('email')) {
    //         $user->email_verified_at = null;
    //     }

    //     //validate paypal_email edit
    //      if ($request->has('paypal_email')) {
    //         $user->paypal_email = $request->input('paypal_email');
    //     }

    //     if ($liste) {
    //         $liste->update($request->validated());
    //     }

    //     $user->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }
