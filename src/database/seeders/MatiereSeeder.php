<?php

namespace Database\Seeders;

use App\Models\Matiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matiere::create([
            'code' => 'ANG',
            'libelle' => 'Anglais',
        ]);

        Matiere::create([
            'code' => 'SVT',
            'libelle' => 'Sciences de la Vie et de la Terre',
        ]);

        Matiere::create([
            'code' => 'MATHS',
            'libelle' => 'Mathématiques',
        ]);
    }
}
