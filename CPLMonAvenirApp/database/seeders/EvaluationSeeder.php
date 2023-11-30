<?php

namespace Database\Seeders;

use App\Models\Cours;
use App\Models\Evaluation;
use App\Models\Matiere;
use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        /* Pour créer une évaluation il faut tout d'abord récuperer la promotion (niveau),
        concerné puis toutes les classes de ce niveau. 
        Ensuite recuperer toutes les matières du niveau et trier pour prendre la matières évaluée.
        Puis dans toutes les classes du niveau récupérer les cours dans chaque matière, et enfin trier chaque cours afin de voir celui fait dans la matière donnée en comparant les identifiants des matières.


        */

        // Récupération d'une promotion d'une année scolaire donnée
        $promotion = Promotion::where('nom', '6')->whereHas('anneeScolaire', function ($query) {
            $query->where('annee', '2022-2023');
        })->first();

        // Récupération de toutes les classes de niveau
        $classes = $promotion->classes;

        // Récupération de toutes les matières enseignées dans ce niveau
        $matieres = $promotion->matieres;

        // Tri afin de récupérer la matière à évaluer
        foreach ($matieres as $matiere) {
            if ($matiere->intitule === 'Mathématiques') {
                $mathematiques = $matiere;
            }
        }


        // tableau destiné à contenir tous les cours dans la matière données dans ce niveau
        $list_cours = [];


        // Pour chaque classe du niveau on récupère les cours donnés et on compare l'identifiant de leur matière avec celle de la matière de l'évaluation
        foreach ($classes as $classe) {
            foreach ($classe->cours as $cour) {
                if ($cour->matiere->id === $mathematiques->id) {
                    array_push($list_cours, $cour);
                }
            }
        }


        // Et enfin on créee une évaluation identique pour chacun des cours destiné à chaque classe
        foreach ($list_cours as $cours) {
            Evaluation::create([
                'intitule' => 'Devoir de Mathématiques 6eme',
                'type' => 'devoir',
                'date' => '2023-05-12',
                'note_maximale' => 20,
                'cours_id' => $cours->id
            ]);
        }
    }
}
