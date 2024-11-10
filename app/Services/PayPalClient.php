<?php

namespace App\Services;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Log;

class PayPalClient
{
    // public static function getApiContext()
    // {
    //     $apiContext = new ApiContext(
    //         new OAuthTokenCredential(
    //             config('services.paypal.client_id'),
    //             config('services.paypal.secret')
    //         )
    //     );
    //     $apiContext->setConfig(['mode' => config('services.paypal.mode')]);

    //     return $apiContext;
    // }

    public static function getApiContext()
{
    try {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.secret')
            )
        );

        $apiContext->setConfig(['mode' => config('services.paypal.mode')]);
        return $apiContext;

    } catch (\Exception $e) {
        \Log::error('Erreur lors de la configuration PayPal API : ' . $e->getMessage());
        throw new \Exception('Erreur de configuration PayPal.');
    }
}

}
