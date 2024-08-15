<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liste;
use App\Services\PaymentService;

class ContributionController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $liste = Liste::findOrFail($id);
        $paymentService = new PaymentService();
        $paymentService->contributeToList($liste, $request->amount, $request->payment_method_id);

        return redirect()->route('lists.show', $liste->id)->with('success', 'Contribution réussie!');
    }
}
