<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{

    // méthode ajax permettant de changer l'année scolaire de l'application

    public function changeAppCurrentYear(AnneeScolaire $anneeScolaire)
    {

        $url = '/dashboard';

        $predAnnee = AnneeScolaire::getAnneeScolaire();
        $predAnnee->update([
            'courant' => !$predAnnee->courant
        ]);

        $predAnnee->save();

        $anneeScolaire->update([
            'courant' => !$anneeScolaire->courant
        ]);

        $anneeScolaire->save();

        return response()->json(['success' => true, 'message' => 'Année scolaire changée pour ' . $anneeScolaire->annee, 'url' => $url]);
    }
}
