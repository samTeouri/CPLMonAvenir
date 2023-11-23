<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Niveau;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = Eleve::all();
        return view('admin.eleves.index', ['eleves' => $eleves]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $niveaux = Niveau::all();
        return view('admin.eleves.create', ['niveaux' => $niveaux]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'email',
            'date_naissance' => 'required|date',
            'classe_id' => 'required|integer',
            'profil' => 'mimes:jpeg,jpg,png,pneg|max:10000',
        ]);

        $classe = Classe::find($request->classe_id)->first();

        if (!$classe) {
            redirect()->route('eleves.create')->with(['error' => 'La classe choisie n\'existe pas']);
        }

        if ($request->file('profil')){
            $profil = $request->file('profil');
            $filenameWithoutExtension = pathinfo($profil->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $profil->getClientOriginalExtension();
            $nom = $filenameWithoutExtension . '-' . time() .  '.' . $extension;
            $chemin = $profil->storeAs('images/users/profils/eleves/' . $request->nom . '_' . $request->prenom . '_' . $request->matricule, $nom, 'public');

            $user = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'profil' => $chemin,
                'email' => $request->email,
                'password' => Hash::make('1234'),
            ]);
        } else {
            $user = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'password' => Hash::make('1234'),
            ]);
        }

        $matricule = substr($request->nom, 0, 1) . substr($request->prenom, 0, 1) . date("Y") . $user->id;

        Eleve::create([
            'date_naissance' => $request->date_naissance,
            'matricule' => $matricule,
            'redoublant' => false,
            'classe_id' => $request->classe_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('eleves.create')->with('success', 'Élève inscrit avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eleve $eleve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eleve $eleve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        //
    }
}
