<?php

namespace Database\Seeders;

use App\Models\Professeur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Professeur::create([
            'niveau_etudes' => 'Licence',
            'user_id' => 4
        ]);

        Professeur::create([
            'niveau_etudes' => 'Doctorat',
            'user_id' => 5
        ]);

        Professeur::create([
            'niveau_etudes' => 'Master',
            'user_id' => 6
        ]);
    }
}
