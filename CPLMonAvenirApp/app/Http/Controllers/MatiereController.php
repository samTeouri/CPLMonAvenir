<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use App\Models\Cours;
use App\Models\Matiere;
use App\Models\Promotion;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    //

    public function index()
    {
        $annee = AnneeScolaire::getAnneeScolaire();

        $promotions = $annee->promotions;

        $matieres = [];

        foreach ($promotions as $promotion) {
            foreach ($promotion->matieres as $matiere) {
                // Utiliser l'identifiant de la matière comme clé
                $matiereId = $matiere->id;

                // Vérifier si la matière n'a pas déjà été ajoutée
                if (!isset($matieres[$matiereId])) {
                    // Ajouter la matière au tableau
                    $matieres[$matiereId] = $matiere;
                }
            }
        }

        // Le tableau $matieres ne contiendra que des matières uniques
        $matieres = array_values($matieres);

        $data = [
            'matieres' => $matieres,
            'annee' => $annee->annee
        ];

        return view('matiere.index', $data);
    }

    public function create()
    {
        $annee = AnneeScolaire::getAnneeScolaire();

        $data = [
            'annee' => $annee->annee
        ];

        return view('matiere.create', $data);
    }

    public function store(Request $request)
    {

        $url = url()->previous();

        $matiere = Matiere::create([
            'intitule' => $request->intitule
        ]);

        foreach ($request->promotions as $promotionID) {
            $promotion = Promotion::find($promotionID);
            $promotion->matieres()->attach($matiere);
            $classes = $promotion->classes;
            foreach ($classes as $classe) {
                Cours::create([
                    'nom' => $matiere->intitule . ' ' . $classe->nom,
                    'coefficient' => 1,
                    'classe_id' => $classe->id,
                    'matiere_id' => $matiere->id
                ]);
            }
        }

        return redirect()->to($url)->with('notification', ['type' => 'success', 'message' => 'Matière crée avec succès']);
    }


    public function edit(Matiere $matiere)
    {
    }

    public function update(Matiere $matiere)
    {
    }


    public function destroy(Matiere $matiere)
    {
        $url = url()->previous();
        $matiere->delete();
        return redirect()->to($url)->with('notification', ['type' => 'success', 'message' => 'Matière supprimée']);
    }
}
