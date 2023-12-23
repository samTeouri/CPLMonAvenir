<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfesseurController extends Controller
{
    //
    public function index()
    {
        $professeurs = Professeur::all();
        $data = [
            'professeurs' => $professeurs
        ];

        return view('professeur.index', $data);
    }

    public function create()
    {
        return view('professeur.create');
    }

    public function store(Request $request)
    {

        $prenom = explode(' ', $request->prenom);

        $user = User::create([
            'username' => substr($request->nom, 0, 1) . $prenom[0],
            'password' => Hash::make('monavenir1234')
        ]);

        $request['user_id'] = $user->id;

        Professeur::create($request->all());

        return redirect()->to(route('professeur.index'))->with('notification', ['type' =>  'success', 'message' =>  "Enseignant recruté"]);
    }

    public function edit(Professeur $professeur)
    {
        $classes = [];
        $anneeScolaire = AnneeScolaire::getAnneeScolaire();
        $promotions = $anneeScolaire->promotions;
        foreach ($promotions as $promotion) {
            foreach ($promotion->classes as $classe) {
                if ($classe->professeur === null || ($classe->professeur->id === $professeur->id)) {
                    array_push($classes, $classe);
                }
            }
        }
        $data = [
            'classes' => $classes,
            'professeur' => $professeur
        ];

        return view('professeur.edit', $data);
    }

    public function update(Request $request, Professeur $professeur)
    {
        $professeur->update($request->all());

        if ($request->classe_id && $request->classe_id === 'aucune') {
            $classe = Classe::find($professeur->classe->id);
            $classe->update([
                'professeur_id' => null
            ]);
        } else {
            $classe = Classe::find($request->classe_id);

            $classe->update([
                'professeur_id' => $professeur->id
            ]);
        }

        return redirect()->to(route('professeur.index'))->with('notification', ['type' =>  'success', 'message' =>  "Enseignant modifié"]);
    }


    public function destroy(Professeur $professeur)
    {
        $url = url()->previous();

        $cours = $professeur->cours;

        foreach ($cours as $cour) {
            $cour->update([
                'professeur_id' => null,
            ]);
            $cour->save();
        }

        $professeur->delete();

        return redirect()->to($url)->with('notification', ['type' =>  'success', 'message' =>  "L'enseignant à été supprimé"]);
    }
}
