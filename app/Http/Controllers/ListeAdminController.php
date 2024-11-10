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

class ListeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $listes = Liste::paginate();

        $users = User::paginate();


        return view('admin.listes.index', compact('listes', 'users'))
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

        return view('admin.listes.create', compact('liste', 'userId'));
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

        return Redirect::route('admin.listes.index')
            ->with('success', 'Liste created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $liste = Liste::find($id);

        // return view('liste.show', compact('liste'));
        return view('admin.listes.show', compact('liste'));
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
        $data = $request->validated();

        // $liste->update($request->validated());
        // return Redirect::route('admin.dashboard')
        //     ->with('success', 'Liste updated successfully');


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
                    return Redirect::route('admin.listes')
                        ->withErrors(['liste_error' => 'Failed to update liste information.'])
                        ->withInput();
                }
            }


        try {
            // Update user data
            $liste->fill($data);
            $liste->save();
        } catch (\Exception $e) {
            return Redirect::route('admin.listes.index')
                ->withErrors(['list_error' => 'Failed to update liste information.'])
                ->withInput();
        }
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
            return Redirect::route('admin.dashboard')
                ->with('error', 'You are not authorized to delete this liste');
        }

    }
}
