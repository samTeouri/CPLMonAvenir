<?php

namespace App\Console\Commands;

use App\Models\AnneeScolaire;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PassageEleves extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eleves:passage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Déclenche le passage des élèves en année supérieure';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $aujourdHui = Carbon::now();
        $anneeScolaire = AnneeScolaire::getAnneeScolaire();
        $promotions = $anneeScolaire->promotions;

        $nextYear = AnneeScolaire::where('annee', '=', $aujourdHui->year . '-' . $aujourdHui->year + 1)->first();


        foreach ($promotions as $promotion) {
            foreach ($promotion->classes as $classe) {
                foreach ($classe->eleves as $eleve) {
                    if ($nextYear) {
                        $nom_promotion_actuelle = intval($promotion->nom);
                        if ($eleve->passeEnClasseSup($classe->id)) {
                            if ($nom_promotion_actuelle > 3) {
                                $nom_promotion_suiv = $nom_promotion_actuelle - 1;
                                $promotion_suiv = Promotion::where('annee_scolaire_id', $nextYear->id)->where('nom', strval($nom_promotion_suiv))->first();
                                $classe_suiv_pass = $promotion_suiv->classes[0];
                                if (!in_array($eleve->id, $classe_suiv_pass->eleves->pluck('id')->toArray())) {
                                    $eleve->classes()->attach($classe_suiv_pass);
                                    $eleve->update([
                                        'redoublant' => false
                                    ]);
                                }
                                $temp_promotion_suiv = Promotion::where('annee_scolaire_id', $nextYear->id)->where('nom', strval($nom_promotion_actuelle))->first();
                                $temp_classe_suiv_pass = $temp_promotion_suiv->classes[0];

                                if (in_array($eleve->id, $temp_classe_suiv_pass->eleves->pluck('id')->toArray())) {
                                    $eleve->classes()->detach($temp_classe_suiv_pass);
                                }
                            }
                        } else {
                            $promotion_suiv = Promotion::where('annee_scolaire_id', $nextYear->id)->where('nom', strval($nom_promotion_actuelle))->first();
                            $classe_suiv = $promotion_suiv->classes[0];
                            if (!in_array($eleve->id, $classe_suiv->eleves->pluck('id')->toArray())) {
                                $eleve->classes()->attach($classe_suiv);
                                $eleve->update([
                                    'redoublant' => true
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
