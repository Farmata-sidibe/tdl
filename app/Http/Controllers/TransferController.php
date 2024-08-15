<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liste;
use App\Services\PaymentService;

class TransferController extends Controller
{
    public function requestTransfer(Request $request, $id)
    {
        $liste = Liste::findOrFail($id);

        // Vérifiez que la liste a les informations nécessaires enregistrées et est vérifiée
        if (!$liste->stripe_account_id || !$liste->identity_verified) {
            return redirect()->back()->with('error', 'Veuillez activer votre cagnotte en fournissant les informations nécessaires.');
        }

        // Utilisez un service pour effectuer le virement
        $paymentService = new PaymentService();
        $result = $paymentService->transferToUser($liste);

        if ($result['status'] == 'success') {
            return redirect()->route('lists.show', $liste->id)->with('success', 'Virement effectué avec succès!');
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
}
