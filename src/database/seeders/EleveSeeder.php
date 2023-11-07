<?php

namespace Database\Seeders;

use App\Models\Eleve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eleve::create([
            'date_naissance' => '2013-06-07',
            'matricule' => 'AB202301',
            'redoublant' => false,
            'classe_id' => 1,
            'user_id' => 1,
        ]);

        Eleve::create([
            'date_naissance' => '2011-02-12',
            'matricule' => 'ZO202302',
            'redoublant' => true,
            'classe_id' => 2,
            'user_id' => 2,
        ]);

        Eleve::create([
            'date_naissance' => '2009-12-23',
            'matricule' => 'KD202303',
            'redoublant' => false,
            'classe_id' => 3,
            'user_id' => 3,
        ]);
    }
}
