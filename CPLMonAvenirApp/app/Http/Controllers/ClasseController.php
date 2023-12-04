<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Cours;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\View\ViewException;
use Ismaelw\LaraTeX\LaraTeX;

class ClasseController extends Controller
{
    // liste des élèves de la classe
    public function index(Classe $classe)
    {

        $eleves = $classe->eleves;

        $data = [
            'classe' => $classe,
            'eleves' => $eleves->sortBy('nom')
        ];

        return view('classe.index', $data);
    }


    public function listeClasses(Promotion $promotion)
    {
        $data = [
            'promotion' => $promotion
        ];

        return view('classe.liste-classes', $data);
    }


    public function create(Promotion $promotion)
    {
        $data = [
            'promotion' => $promotion
        ];

        return view('classe.create', $data);
    }

    public function store(Request $request)
    {
        $url = url()->previous();
        $promotion = Promotion::find($request->promotion_id);


        $classe = Classe::create([
            'nom' => $promotion->nom . 'eme' . ' ' .  $request->nom . ' ' . $promotion->anneeScolaire->annee,
            'promotion_id' => $promotion->id
        ]);

        // on récupère les matières de la promotion
        $matieres = $promotion->matieres;

        foreach ($matieres as $matiere) {
            Cours::create([
                'nom' => $matiere->intitule . ' ' . $classe->nom,
                'classe_id' => $classe->id,
                'matiere_id' => $matiere->id
            ]);
        }

        return redirect()->to($url)->with('notification', ['type' =>  'success', 'message' => 'Nouvelle de classe de ' . $promotion->nom . 'eme' . ' crée']);
    }

    public function destroy(Classe $classe)
    {
        $url = url()->previous();
        $classe->delete();
        return redirect()->to($url)->with('notification', ['type' =>  'danger', 'message' => 'La classe à été supprimée']);
    }
}
