<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classe::create([
            'code' => '6A',
            'libelle' => 'Sixième A',
            'niveau_id' => 1
        ]);

        Classe::create([
            'code' => '6B',
            'libelle' => 'Sixième B',
            'niveau_id' => 1
        ]);

        Classe::create([
            'code' => '3A',
            'libelle' => 'Troisième A',
            'niveau_id' => 4
        ]);
    }
}
