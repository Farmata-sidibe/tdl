<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Liste;
use App\Observers\ListeObserver;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalService;
use Mockery;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Vérification de votre adresse e-mail')
                ->line('Cliquez sur ce bouton pour vérifier votre adresse e-mail.')
                ->action('Vérifiez', $url);
        });
        Liste::observe(ListeObserver::class);

        // Conditionally bind the PayPal service for testing
        if ($this->app->environment('testing')) {
            $this->app->bind(PayPalService::class, function ($app) {
                return $this->createMockPayPalService();
            });
        }
    }

    protected function createMockPayPalService()
    {
        $mock = Mockery::mock(PayPalService::class);

        // Mock the create method
        $mock->shouldReceive('create')->andReturnSelf();

        // Mock the execute method
        $mock->shouldReceive('execute')->andReturnSelf();

        return $mock;
    }
}
