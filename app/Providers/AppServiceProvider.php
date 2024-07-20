<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Liste;
use App\Observers\ListeObserver;
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
        Liste::observe(ListeObserver::class);
    }


}
