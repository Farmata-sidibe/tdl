<?php

namespace App\Services;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalService
{
    protected $apiContext;

    public function __construct()
    {
        $paypalConfig = config('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['secret']
            )
        );
        $this->apiContext->setConfig($paypalConfig['settings']);
    }

    /**
     * Create a new PayPal payment.
     */
    public function createPayment($amount, $description, $successUrl, $cancelUrl)
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $amountObj = new Amount();
        $amountObj->setCurrency("EUR")
            ->setTotal($amount);

        $transaction = new Transaction();
        $transaction->setAmount($amountObj)
            ->setDescription($description);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($successUrl)
            ->setCancelUrl($cancelUrl);

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors('Error processing PayPal payment.');
        }

        return $payment;
    }

    /**
     * Execute an approved PayPal payment.
     */
    public function executePayment($paymentId, $payerId)
    {
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
        } catch (\Exception $ex) {
            return null;
        }

        return $result;
    }
}
