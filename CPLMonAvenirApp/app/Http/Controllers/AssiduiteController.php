<?php

namespace App\Http\Controllers;

use App\Models\Assiduite;
use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;

class AssiduiteController extends Controller
{
    //
    public function index(Eleve $eleve, Classe $classe)
    {

        $assiduites = [];

        foreach ($eleve->assiduites as $assiduite) {

            foreach ($classe->promotion->trimestres as $trimestre) {
                if ($assiduite->trimestre->id === $trimestre->id) {
                    array_push($assiduites, $assiduite);
                }
            }
        }

        $data = [
            'eleve' => $eleve,
            'classe' => $classe,
            'assiduites' => $assiduites,
        ];

        return view('assiduite.index', $data);
    }

    public function editComportement(Assiduite $assiduite, Classe $classe)
    {
        $data = [
            'assiduite' => $assiduite,
            'classe' => $classe
        ];

        return view('comportement.edit', $data);
    }

    public function updateComportement(Request $request, Assiduite $assiduite)
    {
        $url = url()->previous();

        $avertissement = $request->avertissement;
        $blame = $request->blame;

        $comportement = [];

        $comportement_avertissement = [];

        $comportement_blame = [];

        if ($avertissement) {
            if (array_key_exists('Discipline', $avertissement)) {
                $comportement_avertissement['Discipline'] = true;
            } else {
                $comportement_avertissement['Discipline'] = false;
            }

            if (array_key_exists('Travail', $avertissement)) {
                $comportement_avertissement['Travail'] = true;
            } else {
                $comportement_avertissement['Travail'] = false;
            }
        } else {
            $comportement_avertissement['Travail'] = false;
            $comportement_avertissement['Discipline'] = false;
        }



        if ($blame) {
            if (array_key_exists('Discipline', $blame)) {
                $comportement_blame['Discipline'] = true;
            } else {
                $comportement_blame['Discipline'] = false;
            }

            if (array_key_exists('Travail', $blame)) {
                $comportement_blame['Travail'] = true;
            } else {
                $comportement_blame['Travail'] = false;
            }
        } else {
            $comportement_blame['Travail'] = false;
            $comportement_blame['Discipline'] = false;
        }





        $comportement['avertissement'] = $comportement_avertissement;
        $comportement['blame'] = $comportement_blame;

        $assiduite->update([
            'comportement' => json_encode($comportement)
        ]);

        return redirect()->to($url)->with('notification', ['type' =>  'success', 'message' => "Comportement de l'élève mis à jour"]);
    }
}
