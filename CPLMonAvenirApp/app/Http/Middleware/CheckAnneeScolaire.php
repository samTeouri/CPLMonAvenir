<?php

namespace App\Http\Middleware;

use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Promotion;
use App\Models\Trimestre;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAnneeScolaire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $aujourdHui = Carbon::now();



        // Changement d'année scolaire chaque 31 Août

        if ($aujourdHui->month == 8 && $aujourdHui->day == 31) {
            $currentAnneeScolaire = AnneeScolaire::getAnneeScolaire();
            if ($currentAnneeScolaire) {

                // vérifier si l'année suivante existe
                $nextYear = AnneeScolaire::where('annee', '=', $aujourdHui->year + 1  . '-' . $aujourdHui->year + 2)->first();

                //ddd($nextYear);

                if ($nextYear === null) {
                    //ddd('heelo');
                    $currentAnneeScolaire->update(['courant' => false]);
                    $currentAnneeScolaire->save();



                    // Créez une nouvelle année scolaire et activez-la
                    $newAnneeScolaire = AnneeScolaire::create(['annee' => $aujourdHui->year + 1  . '-' . $aujourdHui->year + 2, 'courant' => true]);

                    // Création automatique des niveaux, trimestres et classes de la nouvelle année scolaire
                    // création des promotions
                    for ($i = 6; $i > 2; $i--) {
                        $promotion = Promotion::create([
                            'nom' => $i,
                            'annee_scolaire_id' => $newAnneeScolaire->id
                        ]);

                        // création des trimestres
                        for ($j = 1; $j < 4; $j++) {

                            Trimestre::create([
                                'intitule' => 'Trimestre ' . $j . ' ' . $promotion->nom . 'eme ' . $promotion->anneeScolaire->annee,
                                'promotion_id' => $promotion->id
                            ]);
                        }

                        // création des classes
                        Classe::create([
                            'nom' => $promotion->nom . 'eme A' . ' ' . $promotion->anneeScolaire->annee,
                            'promotion_id' => $promotion->id
                        ]);
                    }
                }
            }
        }

        return $next($request);
    }
}
