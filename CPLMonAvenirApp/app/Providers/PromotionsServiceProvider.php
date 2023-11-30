<?php

namespace App\Providers;

use App\Models\AnneeScolaire;
use Illuminate\Support\ServiceProvider;

class PromotionsServiceProvider extends ServiceProvider
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

        $anneeScolaire = AnneeScolaire::getAnneeScolaire();
        $promotions = $anneeScolaire->promotions;

        view()->composer('*', function ($view) use ($promotions) {
            $view->with('promotions', $promotions);
        });
    }
}
