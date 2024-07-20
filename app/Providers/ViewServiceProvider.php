<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Liste;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
         // Partager les données avec toutes les vues
         View::composer('*', function ($view) {
            $user = auth()->user();
            // $liste = $user ? Liste::where('user_id', $user->id)->first() : null;
            $view->with('user', $user);
        });
    }
}
