<?php

namespace Database\Seeders;

use App\Models\AnneesScolaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnneesScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnneesScolaire::create([
            'annee_debut' => 2022,
            'annee_fin' => 2023,
        ]);
    }
}
