<?php

namespace App\Providers;

use App\Models\AnneeScolaire;
use App\Models\Eleve;
use Illuminate\Support\ServiceProvider;

class YearsServiceProvider extends ServiceProvider
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


        $anneesScolaires = AnneeScolaire::all()->sortByDesc('annee');

        view()->composer('*', function ($view) use ($anneesScolaires) {
            $view->with('anneesScolaires', $anneesScolaires);
        });
    }
}
