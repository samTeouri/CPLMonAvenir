<?php

namespace Database\Seeders;

use App\Models\MatieresNiveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatieresNiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MatieresNiveau::create([
            'coefficient' => 1,
            'nombre_heures' => 4,
            'matiere_id' => 1,
            'niveau_id' => 1,
        ]);

        MatieresNiveau::create([
            'coefficient' => 1,
            'nombre_heures' => 4,
            'matiere_id' => 2,
            'niveau_id' => 1,
        ]);

        MatieresNiveau::create([
            'coefficient' => 2,
            'nombre_heures' => 7,
            'matiere_id' => 3,
            'niveau_id' => 1,
        ]);

        MatieresNiveau::create([
            'coefficient' => 1,
            'nombre_heures' => 7,
            'matiere_id' => 1,
            'niveau_id' => 4,
        ]);

        MatieresNiveau::create([
            'coefficient' => 2,
            'nombre_heures' => 8,
            'matiere_id' => 2,
            'niveau_id' => 4,
        ]);

        MatieresNiveau::create([
            'coefficient' => 2,
            'nombre_heures' => 10,
            'matiere_id' => 3,
            'niveau_id' => 4,
        ]);
    }
}
