<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AnneeScolaireSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(ProfesseurSeeder::class);
        //$this->call(EleveSeeder::class);
        //$this->call(MatiereSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(ClasseSeeder::class);
        //$this->call(EvaluationSeeder::class);
        //$this->call(NoteSeeder::class);
       
    }
}
