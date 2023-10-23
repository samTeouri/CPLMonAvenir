<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Niveau::create([
            'code' => '6',
            'libelle' => 'sixième'
        ]);

        Niveau::create([
            'code' => '5',
            'libelle' => 'cinquième'
        ]);

        Niveau::create([
            'code' => '4',
            'libelle' => 'quatrième'
        ]);

        Niveau::create([
            'code' => '3',
            'libelle' => 'troisième'
        ]);
    }
}
