<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PayPalService;

class PayPalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PayPalService::class, function ($app) {
            return new PayPalService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
