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
}
