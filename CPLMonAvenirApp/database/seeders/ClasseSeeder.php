<?php

namespace Database\Seeders;

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
        $promotion_5 = Promotion::find(5);
        $promotion_6 = Promotion::find(6);
        $promotion_7 = Promotion::find(7);
        $promotion_8 = Promotion::find(8);

        $classe_1 = Classe::create([
            'nom' => '6eme A' . ' ' . $promotion_1->anneeScolaire->annee,
            'promotion_id' => $promotion_1->id
        ]);

        $classe_2 = Classe::create([
            'nom' => '6eme B' . ' ' . $promotion_1->anneeScolaire->annee,
            'promotion_id' => $promotion_1->id
        ]);

        $classe_3 = Classe::create([
            'nom' => '6eme A' . ' ' . $promotion_5->anneeScolaire->annee,
            'promotion_id' => $promotion_5->id
        ]);

        $classe_4 = Classe::create([
            'nom' => '6eme B' . ' ' . $promotion_5->anneeScolaire->annee,
            'promotion_id' => $promotion_5->id
        ]);

        $classe_5 = Classe::create([
            'nom' => '5eme A' . ' ' . $promotion_2->anneeScolaire->annee,
            'promotion_id' => $promotion_2->id
        ]);

        $classe_6 = Classe::create([
            'nom' => '5eme A' . ' ' . $promotion_6->anneeScolaire->annee,
            'promotion_id' => $promotion_6->id
        ]);

        $classe_7 = Classe::create([
            'nom' => '4eme A' . ' ' . $promotion_3->anneeScolaire->annee,
            'promotion_id' => $promotion_3->id
        ]);

        $classe_8 = Classe::create([
            'nom' => '4eme A' . ' ' . $promotion_7->anneeScolaire->annee,
            'promotion_id' => $promotion_7->id
        ]);

        $classe_9 = Classe::create([
            'nom' => '3eme A' . ' ' . $promotion_4->anneeScolaire->annee,
            'promotion_id' => $promotion_4->id
        ]);

        $classe_10 = Classe::create([
            'nom' => '3eme A' . ' ' . $promotion_8->anneeScolaire->annee,
            'promotion_id' => $promotion_8->id
        ]);

        $eleve_1 = Eleve::find(1);
        $eleve_2 = Eleve::find(2);
        $eleve_3 = Eleve::find(3);
        $eleve_4 = Eleve::find(4);

        $eleve_1->classes()->attach($classe_5);
        $eleve_2->classes()->attach($classe_3);

        $eleve_2->classes()->attach($classe_5);
        $eleve_1->classes()->attach($classe_3);

        $eleve_3->classes()->attach($classe_4);

        $eleve_4->classes()->attach($classe_4);



        $matieres = Matiere::all();

        $professeur = Professeur::find(1);

        // création des cours pour chaque classe créée en fonction des matières enseignées dans le niveau
        foreach ($matieres as $matiere) {
            // récupération des niveaux dans lesquels sont enseignés la matière
            $niveaux = $matiere->promotions;
            foreach ($niveaux as $niveau) {
                // récupération des classes du niveau et création des cours destinés
                $classes = $niveau->classes;
                foreach ($classes as $classe) {
                    Cours::create([
                        'nom' => $matiere->intitule . ' ' . $classe->nom,
                        'coefficient' => 1,
                        'professeur_id' => $professeur->id,
                        'classe_id' => $classe->id,
                        'matiere_id' => $matiere->id
                    ]);
                }
            }
        }
    }
}
