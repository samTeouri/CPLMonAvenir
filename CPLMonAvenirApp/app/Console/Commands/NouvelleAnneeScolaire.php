<?php

namespace App\Console\Commands;

use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Promotion;
use App\Models\Trimestre;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NouvelleAnneeScolaire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anneeScolaire:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cette commande permet de rajouter une nouvelle année scolaire et de passer à celle-ci';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $aujourdHui = Carbon::now();



        // Changement d'année scolaire chaque 31 Août


        $currentAnneeScolaire = AnneeScolaire::getAnneeScolaire();
        if ($currentAnneeScolaire) {

            // vérifier si l'année suivante existe
            $nextYear = AnneeScolaire::where('annee', '=', $aujourdHui->year   . '-' . $aujourdHui->year + 1)->first();


            if ($nextYear === null) {


                $currentAnneeScolaire->update(['courant' => false]);
                $currentAnneeScolaire->save();



                // Créez une nouvelle année scolaire et activez-la
                $newAnneeScolaire = AnneeScolaire::create(['annee' => $aujourdHui->year   . '-' . $aujourdHui->year + 1, 'courant' => true]);

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
}
