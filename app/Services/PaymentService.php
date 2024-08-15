<?php

namespace App\Services;

use App\Models\User;
use App\Models\Liste;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\Account;
use Stripe\Transfer;

class PaymentService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

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
                'first_name' => $user->name,
                'last_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'dob' => [
                    'day' => 1,
                    'month' => 1,
                    'year' => 1990,
                ],
                'verification' => [
                    'document' => [
                        'front' => 'file_id_for_front',
                        'back' => 'file_id_for_back',
                    ],
                    'additional_document' => [
                        'file_id' => 'file_id_for_selfie',
                    ],
                ],
            ],
            'tos_acceptance' => [
                'date' => time(),
                'ip' => request()->ip(),
            ],
        ]);

        return $account->id;
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
                // 'payment_method_types' => ['card'],
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
