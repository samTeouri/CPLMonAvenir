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
        $user_4 = User::find(4);
        $user_5 = User::find(5);

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



        $eleve_3 = Eleve::create([
            'nom' => 'GANIOU',
            'prenom' => 'Hayirou',
            'date_naissance' => '2002-06-07',
            'lieu_naissance' => 'Paris',
            'profil' => 'image',
            'adresse' => 'Didaure derrière le stade Municipal',
            'user_id' => $user_4->id
        ]);

        $eleve_3->contact_tuteur = ['nom' => 'TEOURI', 'prenom' => 'Sabirou', 'telephone' => '90918141', 'adresse' => 'Komah'];

        $eleve_3->matricule = substr(strtolower($eleve_3->nom), 0) . strtolower($eleve_3->prenom) . $annee;

        $eleve_3->save();





        $eleve_4 = Eleve::create([
            'nom' => 'ABIOYO',
            'prenom' => 'Markoissi',
            'date_naissance' => '2002-06-07',
            'lieu_naissance' => 'Paris',
            'profil' => 'image',
            'adresse' => 'Didaure derrière le stade Municipal',
            'user_id' => $user_5->id
        ]);

        $eleve_4->contact_tuteur = ['nom' => 'TEOURI', 'prenom' => 'Sabirou', 'telephone' => '90918141', 'adresse' => 'Komah'];

        $eleve_4->matricule = substr(strtolower($eleve_4->nom), 0) . strtolower($eleve_4->prenom) . $annee;

        $eleve_4->save();
    }
}
