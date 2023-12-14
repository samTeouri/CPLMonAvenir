<?php

namespace App\Http\Controllers;

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
}
