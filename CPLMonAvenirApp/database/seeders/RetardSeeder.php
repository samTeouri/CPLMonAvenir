<?php

namespace Database\Seeders;

use App\Models\Retard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Retard::create([
            'date' => '2023-09-27',
            'heure_arrivee' => '08:12:00',
            'justifie' => true,
            'justification' => 'Malade',
            'eleve_id' => 1,
            'trimestre_id' => 1
        ]);

        Retard::create([
            'date' => '2023-10-02',
            'heure_arrivee' => '07:21:00',
            'justifie' => false,
            'eleve_id' => 1,
            'trimestre_id' => 1
        ]);

        Retard::create([
            'date' => '2023-10-05',
            'heure_arrivee' => '07:16:00',
            'justifie' => false,
            'eleve_id' => 1,
            'trimestre_id' => 1
        ]);

        Retard::create([
            'date' => '2023-10-20',
            'heure_arrivee' => '08:45:00',
            'justifie' => false,
            'eleve_id' => 3,
            'trimestre_id' => 1
        ]);
    }
}
