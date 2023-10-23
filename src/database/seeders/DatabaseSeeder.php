<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AnneeScolaire;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(MatiereSeeder::class);
        $this->call(NiveauSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(ProfesseurSeeder::class);
        $this->call(EleveSeeder::class);
        $this->call(CoursSeeder::class);
        $this->call(AnneesScolaireSeeder::class);
        $this->call(TrimestreSeeder::class);
        $this->call(NoteSeeder::class);
        $this->call(BulletinSeeder::class);
        $this->call(MatieresNiveauSeeder::class);
        $this->call(RetardSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
