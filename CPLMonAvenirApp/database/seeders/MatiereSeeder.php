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
        //

        Matiere::create([
            'intitule' => 'Mathématiques'
        ]);

        Matiere::create([
            'intitule' => 'Français'
        ]);

        Matiere::create([
            'intitule' => 'Anglais'
        ]);

        Matiere::create([
            'intitule' => 'Physique-Chimie'
        ]);
    }
}
