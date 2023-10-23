<?php

namespace Database\Seeders;

use App\Models\Bulletin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BulletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bulletin::create([
            'eleve_id' => 1,
            'trimestre_id' => 1,
        ]);

        Bulletin::create([
            'eleve_id' => 2,
            'trimestre_id' => 1,
        ]);

        Bulletin::create([
            'eleve_id' => 3,
            'trimestre_id' => 1,
        ]);
    }
}
