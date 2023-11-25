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
            'username' => 'monavenir',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'username' => 'eleve1',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'username' => 'eleve2',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'username' => 'enseignant1',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'username' => 'enseignant2',
            'password' => Hash::make('12345678')
        ]);
    }
}
