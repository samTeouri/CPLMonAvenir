<?php

namespace Database\Seeders;

use App\Models\Eleve;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $user_4 = User::find(4);
        $user_5 = User::find(5);

        Professeur::create([
            'nom' => 'BAGOUNA',
            'prenom' => 'Joseph',
            'contact' => '90123456',
            'user_id' => $user_4->id
        ]);

        Professeur::create([
            'nom' => 'RHODES',
            'prenom' => 'Cecile',
            'contact' => '90123456',
            'user_id' => $user_5->id
        ]);
    }
}
