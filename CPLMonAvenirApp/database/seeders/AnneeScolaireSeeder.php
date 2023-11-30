<?php

namespace Database\Seeders;

use App\Models\AnneeScolaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnneeScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        AnneeScolaire::create([
            'annee' => '2023-2024',
            'courant' => true
        ]);

        AnneeScolaire::create([
            'annee' => '2022-2023',
        ]);

        AnneeScolaire::create([
            'annee' => '2021-2022',
        ]);
    }
}
