<?php

namespace Database\Seeders;

use App\Models\AnneeScolaire;
use App\Models\Eleve;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user_2 = User::find(2);
        $user_3 = User::find(3);

        $eleve_1 = Eleve::create([
            'nom' => 'TEOURI',
            'prenom' => 'Ydaou',
            'date_naissance' => '2002-03-25',
            'lieu_naissance' => 'Paris',
            'profil' => 'image',
            'adresse' => 'Didaure derrière le stade Municipal',
            'user_id' => $user_2->id
        ]);

        $annee = AnneeScolaire::getAnneeScolaire()->annee;



        $eleve_1->contact_tuteur = ['nom' => 'TEOURI', 'prenom' => 'Sabirou', 'telephone' => '90918141', 'adresse' => 'Komah'];

        $eleve_1->matricule = substr(strtolower($eleve_1->nom), 0) . strtolower($eleve_1->prenom) . $annee;

        $eleve_1->save();



        $eleve_2 = Eleve::create([
            'nom' => 'TEOURI',
            'prenom' => 'Samrou',
            'date_naissance' => '2002-06-07',
            'lieu_naissance' => 'Paris',
            'profil' => 'image',
            'adresse' => 'Didaure derrière le stade Municipal',
            'user_id' => $user_3->id
        ]);

        $eleve_2->contact_tuteur = ['nom' => 'TEOURI', 'prenom' => 'Sabirou', 'telephone' => '90918141', 'adresse' => 'Komah'];

        $eleve_2->matricule = substr(strtolower($eleve_2->nom), 0) . strtolower($eleve_2->prenom) . $annee;

        $eleve_2->save();
    }
}
