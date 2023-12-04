<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;
use Ismaelw\LaraTeX\LaraTeX;

class LaTexToPDFController extends Controller
{


    // fonction donnant en format PDF la liste des élèves de la classe
    public function listesDesEleves(Classe $classe)
    {
        $data = [
            'eleves' => $classe->eleves->sortBy('nom'),
            'classe' => $classe,
            'annee' => $classe->promotion->anneeScolaire,
            'logo' => public_path('assets/images/logo2.png')
        ];

        return (new LaraTeX('latex.liste-eleves'))->with($data)->inline('liste_des_eleves_' . substr($classe->nom, 0, 6) . '.pdf');
    }


    // fonction générant la fiche d'information de l'élève 
    public function informationsEleve(Eleve $eleve)
    {

       

        $data = [
            'eleve' => $eleve,
            'logo' => public_path('assets/images/logo2.png'),
            'photo_passeport' => public_path('assets/images/user.jpg')
        ];

        return (new LaraTeX('latex.informationEleve'))->with($data)->inline('fiche_information_' . $eleve->nom .  '_' . $eleve->prenom);
    }
}
