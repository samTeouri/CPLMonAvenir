<?php

namespace Database\Seeders;

use App\Models\Assiduite;
use App\Models\Classe;
use App\Models\Cours;
use App\Models\Eleve;
use App\Models\Matiere;
use App\Models\Professeur;
use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $promotion_1 = Promotion::find(1);
        $promotion_2 = Promotion::find(2);
        $promotion_3 = Promotion::find(3);
        $promotion_4 = Promotion::find(4);


        $classe_1 = Classe::create([
            'nom' => '6eme A' . ' ' . $promotion_1->anneeScolaire->annee,
            'promotion_id' => $promotion_1->id
        ]);

        $classe_5 = Classe::create([
            'nom' => '5eme A' . ' ' . $promotion_2->anneeScolaire->annee,
            'promotion_id' => $promotion_2->id
        ]);

        $classe_7 = Classe::create([
            'nom' => '4eme A' . ' ' . $promotion_3->anneeScolaire->annee,
            'promotion_id' => $promotion_3->id
        ]);


        $classe_9 = Classe::create([
            'nom' => '3eme A' . ' ' . $promotion_4->anneeScolaire->annee,
            'promotion_id' => $promotion_4->id
        ]);
    }
}
