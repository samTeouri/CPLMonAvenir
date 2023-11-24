<?php

namespace Database\Seeders;

use App\Models\AnneeScolaire;
use App\Models\Matiere;
use App\Models\Promotion;
use App\Models\Trimestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $annee_1 = AnneeScolaire::find(1);
        $annee_2 = AnneeScolaire::find(2);

        $tab_promotions = [];

        $promotion_1 = Promotion::create([
            'nom' => '6',
            'annee_scolaire_id' => $annee_1->id
        ]);

        array_push($tab_promotions, $promotion_1);

        $promotion_2 = Promotion::create([
            'nom' => '5',
            'annee_scolaire_id' => $annee_1->id
        ]);

        array_push($tab_promotions, $promotion_2);

        $promotion_3 = Promotion::create([
            'nom' => '4',
            'annee_scolaire_id' => $annee_1->id
        ]);

        array_push($tab_promotions, $promotion_3);

        $promotion_4 = Promotion::create([
            'nom' => '3',
            'annee_scolaire_id' => $annee_1->id
        ]);

        array_push($tab_promotions, $promotion_4);

        $promotion_5 = Promotion::create([
            'nom' => '6',
            'annee_scolaire_id' => $annee_2->id
        ]);

        array_push($tab_promotions, $promotion_5);

        $promotion_6 = Promotion::create([
            'nom' => '5',
            'annee_scolaire_id' => $annee_2->id
        ]);

        array_push($tab_promotions, $promotion_6);

        $promotion_7 = Promotion::create([
            'nom' => '4',
            'annee_scolaire_id' => $annee_2->id
        ]);

        array_push($tab_promotions, $promotion_7);

        $promotion_8 = Promotion::create([
            'nom' => '3',
            'annee_scolaire_id' => $annee_2->id
        ]);

        array_push($tab_promotions, $promotion_8);

        $matieres = Matiere::all();


        // création des trimestres de chaque niveau
        foreach ($tab_promotions as $promotion) {
            for ($i = 1; $i < 4; $i++) {

                $trimestre = Trimestre::create([
                    'intitule' => 'Trimestre ' . $i . ' ' . $promotion->nom . 'eme ' . $promotion->anneeScolaire->annee
                ]);
                $promotion->trimestres()->attach($trimestre);
            }

            // ajout des matières enseignées au niveau
            foreach ($matieres as $matiere) {
                $promotion->matieres()->attach($matiere);
            }
        }

        
    }
}
