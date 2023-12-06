<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cours;
use App\Models\Professeur;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Afficher les cours d'une classe
     *
     * @param Classe $classe
     * @return void
     */
    public function index(Classe $classe) {
        $data = [
            'classe' => $classe,
            'cours' => $classe->cours,
            'professeurs' => Professeur::all(),
        ];

        return view('cours.index', $data);
    }

    /**
     * Afficher les détails d'un cours
     *
     * @param Cours $cours
     * @return void
     */
    public function show(Cours $cours) {
        $data = [
            'cours' => $cours,
            'professeurs' => Professeur::all(),
        ];
        return view('cours.show', $data);
    }

    /**
     * Modifier les informations d'un cours
     *
     * @param Cours $cours
     * @param Request $request
     * @return void
     */
    public function update(Cours $cours, Request $request) {
        $cours->update([
            'professeur_id' => $request->professeur_id,
            'coefficient' => $request->coefficient,
        ]);
        return redirect()->route('cours.show', $cours->id)->with('notification', ['type' => 'success', 'message' => 'Affectation ajoutée avec succès']);
    }
}
