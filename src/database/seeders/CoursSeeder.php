<?php

namespace Database\Seeders;

use App\Models\Cours;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cours::create([
            'code' => 'ANG-6A',
            'libelle' => 'Anglais sixième A',
            'matiere_id' => 1,
            'classe_id' => 1,
            'professeur_id' => 1
        ]);

        Cours::create([
            'code' => 'ANG-6B',
            'libelle' => 'Anglais sixième B',
            'matiere_id' => 1,
            'classe_id' => 2,
            'professeur_id' => 1
        ]);

        Cours::create([
            'code' => 'ANG-3',
            'libelle' => 'Anglais troisième',
            'matiere_id' => 1,
            'classe_id' => 3,
            'professeur_id' => 1
        ]);

        Cours::create([
            'code' => 'SVT-6A',
            'libelle' => 'SVT sixième A',
            'matiere_id' => 2,
            'classe_id' => 1,
            'professeur_id' => 2
        ]);

        Cours::create([
            'code' => 'SVT-6B',
            'libelle' => 'SVT sixième B',
            'matiere_id' => 2,
            'classe_id' => 2,
            'professeur_id' => 2
        ]);

        Cours::create([
            'code' => 'SVT-3',
            'libelle' => 'SVT troisième',
            'matiere_id' => 2,
            'classe_id' => 3,
            'professeur_id' => 2
        ]);

        Cours::create([
            'code' => 'MATHS-6A',
            'libelle' => 'Mathématiques sixième A',
            'matiere_id' => 3,
            'classe_id' => 1,
            'professeur_id' => 3
        ]);

        Cours::create([
            'code' => 'MATHS-6B',
            'libelle' => 'Mathématiques sixième B',
            'matiere_id' => 3,
            'classe_id' => 2,
            'professeur_id' => 3
        ]);

        Cours::create([
            'code' => 'MATHS-3',
            'libelle' => 'Mathématiques troisième',
            'matiere_id' => 3,
            'classe_id' => 3,
            'professeur_id' => 3
        ]);
    }
}
