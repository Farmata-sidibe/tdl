<?php

namespace App\Services;

use App\Models\User;
use App\Models\Liste;
use Stripe\Stripe;
use Stripe\Account;
use Stripe\AccountLink;
use Stripe\PaymentIntent;
use Stripe\Transfer;
use Stripe\File;
use Stripe\Refund;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Crée un nouveau compte Stripe pour l'utilisateur donné.
     *
     * @param User $user L'utilisateur pour lequel le compte Stripe est créé.
     * @return string L'ID du compte Stripe nouvellement créé.
     */
    public function createStripeAccount(User $user)
    {
        $account = Account::create([
            'type' => 'express',
            'country' => 'FR',
            'email' => $user->email,
            'capabilities' => [
                'transfers' => ['requested' => true],
                'card_payments' => ['requested' => true],
            ],
            'business_type' => 'individual',
            'individual' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'dob' => [
                    'day' => 1,
                    'month' => 1,
                    'year' => 1970,

                ],
            ],
        ]);

        return $account->id;
    }

    /**
     * Créer un lien de compte pour l'intégration.
     *
     * @param string $accountId
     * @return \Stripe\AccountLink
     */
    public function createAccountLink($accountId)
    {
        return AccountLink::create([
            'account' => $accountId,
            'refresh_url' => route('stripe.account.refresh'),
            'return_url' => route('stripe.account.return'),
            'type' => 'account_onboarding',
        ]);
    }


    /**
     * Upload identity verification documents to Stripe.
     *
     * @param string $accountId
     * @param string $documentFrontPath
     * @param string $documentBackPath
     * @param string $selfiePath
     * @return array
     */
    public function uploadIdentityVerification($accountId, $documentFrontPath, $documentBackPath, $selfiePath)
    {
        // Stripe handles most of the document verification internally,
        // so usually, you'll direct the user to Stripe's hosted form.
        // If necessary, you can upload documents like this:
        $documentFront = $this->uploadFile($accountId, $documentFrontPath);
        $documentBack = $this->uploadFile($accountId, $documentBackPath);

        // These files should be assigned to the account via Stripe's API, but this is just an example.
        return [
            'document_front' => $documentFront,
            'document_back' => $documentBack,
        ];
    }


    /**
     * Helper method to upload a file to Stripe.
     *
     * @param string $accountId
     * @param string $filePath
     * @return \Stripe\File
     */
    private function uploadFile($accountId, $filePath)
    {
        return File::create([
            'purpose' => 'identity_document',
            'file' => fopen($filePath, 'r'),
            'metadata' => ['account_id' => $accountId],
        ]);
    }

    /**
     * Traiter un paiement de contribution pour une liste donnée.
     *
     * @param Liste $liste
     * @param float $amount
     * @param string $paymentMethodId
     * @return PaymentIntent|array
     */
    public function contributeToList(Liste $liste, $amount,  string $paymentMethodId)
    {
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount * 100, // Montant en cents
                'currency' => 'eur',
                'payment_method' => $paymentMethodId,
                'off_session' => true,
                'confirm' => true,
                'transfer_data' => [
                    'destination' => $liste->stripe_account_id,
                ],
            ]);

            return $paymentIntent;
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    /**
     * Make a payout to the connected account.
     *
     * @param string $accountId
     * @param int $amount
     * @return \Stripe\Transfer
     */
    public function makePayout($accountId, $amount)
    {
        return Transfer::create([
            'amount' => $amount,
            'currency' => 'usd',
            'destination' => $accountId,
            'transfer_group' => 'Payout for List',
        ]);
    }

    /**
     * Retrieve the connected Stripe account for a given user.
     *
     * @param User $user
     * @return Account|null
     */
    public function getConnectedAccount(User $user)
    {
        $accounts = Account::all([
            'email' => $user->email,
            'limit' => 1,
        ]);

        return $accounts->data[0] ?? null;

    }


    /**
     * Demander un paiement pour une liste donnée.
     *
     * @param Liste $liste
     * @return Transfer|array
     */
    public function transferToUser(Liste $liste)
    {
        try {
            $transfer = Transfer::create([
                'amount' => $this->calculateListBalance($liste),
                'currency' => 'eur',
                'destination' => $liste->stripe_account_id,
            ]);

            return ['status' => 'success', 'transfer' => $transfer];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    /**
     * Calculer le solde d'une liste donnée.
     *
     * @param Liste $liste
     * @return int
     */
    private function calculateListBalance(Liste $liste)
    {
        // Calculez le solde de la liste
        // Supposons que vous avez une table contributions où vous stockez les contributions
        return $liste->contributions()->sum('amount') * 100; // Convertir en cents pour Stripe
    }
}
