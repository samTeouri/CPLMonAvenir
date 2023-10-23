<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nom' => 'ALI',
            'prenom' => 'Bastou',
            'telephone' => 90233240,
            'email' => 'student1@gmail.com',
            'password' => Hash::make('1234')
        ]);

        User::create([
            'nom' => 'ZATCHI',
            'prenom' => 'Orel',
            'telephone' => 77900987,
            'email' => 'student2@gmail.com',
            'password' => Hash::make('1234')
        ]);

        User::create([
            'nom' => 'KARIM',
            'prenom' => 'Djamal',
            'telephone' => 91211209,
            'email' => 'student3@gmail.com',
            'password' => Hash::make('1234')
        ]);

        User::create([
            'nom' => 'OUROYO',
            'prenom' => 'Bilal',
            'telephone' => 98345665,
            'email' => 'professeur1@gmail.com',
            'password' => Hash::make('1234')
        ]);

        User::create([
            'nom' => 'DALIDA',
            'prenom' => 'Khalil',
            'telephone' => 92311350,
            'email' => 'professeur2@gmail.com',
            'password' => Hash::make('1234')
        ]);

        User::create([
            'nom' => 'Joe',
            'prenom' => 'Frazier',
            'telephone' => 90902112,
            'email' => 'professeur3@gmail.com',
            'password' => Hash::make('1234')
        ]);

        User::create([
            'nom' => 'REHIM',
            'prenom' => 'Faouzi',
            'telephone' => 93876551,
            'email' => 'directrice@gmail.com',
            'password' => Hash::make('1234')
        ]);
    }
}
