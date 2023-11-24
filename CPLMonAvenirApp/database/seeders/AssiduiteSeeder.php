<?php

namespace Database\Seeders;

use App\Models\Assiduite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssiduiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $assiduite_1 = Assiduite::create([
            'comportement' => true,
            'eleve_id' => 1,
            'trimestre_id' => 13,
        ]);

        $assiduite_2 = Assiduite::create([
            'comportement' => true,
            'eleve_id' => 2,
            'trimestre_id' => 13,
        ]);


        $assiduite_1->retard = ['1' => ['id' => '1', 'date' => '2023-05-15'], '2' => ['id' => '2', 'date' => '2023-05-15']];
        $assiduite_1->absences = ['1' => ['id' => '1', 'heures_absences' => 4, 'date' => '2023-04-12']];

        $assiduite_1->save();


        $assiduite_2->retard = ['1' => ['id' => '1', 'date' => '2023-05-15'],];
        $assiduite_2->absences = ['1' => ['id' => '1', 'heures_absences' => 4, 'date' => '2023-04-12'], '2' => ['id' => '2', 'heures_absences' => 8, 'date' => '2023-11-22']];

        $assiduite_2->save();
    }
}
