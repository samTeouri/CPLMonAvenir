<?php

namespace App\Http\Controllers;

use App\Exports\ElevesExport;
use App\Imports\ElevesImport;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Promotion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class EleveController extends Controller
{
    //

    public function create()
    {
        return view('eleve.create');
    }

    public function store(Request $request)
    {

        $url = url()->previous();

        $annee = AnneeScolaire::getAnneeScolaire()->annee;

        $pere = ['nom' => $request->nom_pere, 'prenom' => $request->prenom_pere, 'telephone' => $request->contact_pere, 'adresse' => $request->adresse_pere, 'profession' => $request->profession_pere, 'situation_matrimoniale' => $request->situation_matrimoniale_pere];

        $mere = ['nom' => $request->nom_mere, 'prenom' => $request->prenom_mere, 'telephone' => $request->contact_mere, 'adresse' => $request->adresse_mere, 'profession' => $request->profession_mere, 'situation_matrimoniale' => $request->situation_matrimoniale_mere];

        $contact_tuteur = ['nom' => $request->nom_tuteur, 'prenom' => $request->prenom_tuteur, 'telephone' => $request->contact_tuteur, 'adresse' => $request->adresse_tuteur, 'profession' => $request->profession_tuteur, 'situation_matrimoniale' => $request->situation_matrimoniale_tuteur];

        $sante = ['groupe' => $request->groupe_sanguin, 'problemes' => $request->problemes, 'restrictions' => $request->restrictions, 'medicaments' => $request->medicaments];

        $matricule = substr($request->nom, 0, 1) . explode(' ', $request->prenom)[0] . substr($annee, 0, 4);

        $classe = Classe::find($request->classe_id);



        $classe_name_array =  explode(' ', substr($classe->nom, 0, 6));

        $classe_name_for_image_path = $classe_name_array[0] . $classe_name_array[1];



        if ($request->file('profil')) {
            $profil = $request->file('profil')->storeAs($annee . '/' . $classe_name_for_image_path . '/' . $matricule . '.png');
        } else {
            $profil = public_path('assets/media/avatars/avatar1.jpg');
        }

        $user = User::create([
            'username' => $matricule,
            'password' => Hash::make('monavenir1234'),
        ]);


        $eleve = Eleve::create([
            'nom' => strtoupper($request->nom),
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'profil' => $profil,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'adresse' => $request->adresse,
            'matricule' => strtolower($matricule),
            'pere' => json_encode($pere),
            'mere' => json_encode($mere),
            'contact_tuteur' => json_encode($contact_tuteur),
            'sante' => json_encode($sante),
            'user_id' => $user->id,
        ]);

        $eleve->classes()->attach($classe);

        return redirect()->to($url)->with('notification', ['type' => 'danger', 'message' => 'Nouvel élève inscrit']);
    }

    public function edit(Eleve $eleve, Classe $classe)
    {

        $data = [
            'eleve' => $eleve,
            'classe' => $classe
        ];

        return view('eleve.edit', $data);
    }

    public function update(Request $request, Eleve $eleve)
    {

        $url = url()->previous();

        $annee = AnneeScolaire::getAnneeScolaire()->annee;

        $pere = ['nom' => $request->nom_pere, 'prenom' => $request->prenom_pere, 'telephone' => $request->contact_pere, 'adresse' => $request->adresse_pere, 'profession' => $request->profession_pere, 'situation_matrimoniale' => $request->situation_matrimoniale_pere];

        $mere = ['nom' => $request->nom_mere, 'prenom' => $request->prenom_mere, 'telephone' => $request->contact_mere, 'adresse' => $request->adresse_mere, 'profession' => $request->profession_mere, 'situation_matrimoniale' => $request->situation_matrimoniale_mere];

        $contact_tuteur = ['nom' => $request->nom_tuteur, 'prenom' => $request->prenom_tuteur, 'telephone' => $request->contact_tuteur, 'adresse' => $request->adresse_tuteur, 'profession' => $request->profession_tuteur, 'situation_matrimoniale' => $request->situation_matrimoniale_tuteur];

        $sante = ['groupe' => $request->groupe_sanguin, 'problemes' => $request->problemes, 'restrictions' => $request->restrictions, 'medicaments' => $request->medicaments];

        $matricule = substr($request->nom, 0, 1) . explode(' ', $request->prenom)[0] . substr($annee, 0, 4);

        $classe = Classe::find($request->classe_id);

        $classe_name_array =  explode(' ', substr($classe->nom, 0, 6));

        $classe_name_for_image_path = $classe_name_array[0] . $classe_name_array[1];


        if ($request->photo_change === "1") {
            $profil = $request->file('profil')->storeAs($annee . '/' . $classe_name_for_image_path . '/' . $matricule . '.png');
        } else {
            $profil = $eleve->profil;
        }

        $eleve->update([
            'nom' => strtoupper($request->nom),
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'profil' => $profil,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'adresse' => $request->adresse,
            'matricule' => strtolower($matricule),
            'pere' => json_encode($pere),
            'mere' => json_encode($mere),
            'contact_tuteur' => json_encode($contact_tuteur),
            'sante' => json_encode($sante),
        ]);

        return redirect()->to($url)->with('notification', ['type' => 'success', 'message' => 'Elève modifié']);
    }


    public function destroy(Eleve $eleve)
    {
        $url = url()->previous();
        $eleve->delete();
        return redirect()->to($url)->with('notification', ['type' => 'success', 'message' => 'Elève supprimé']);
    }

    public function passageAnneeSup(Request $request, Classe $classe)
    {
        $url = url()->previous();

        $eleves_id = explode(',', $request->eleves);

        $promotion = $classe->promotion;



        $aujourdHui = Carbon::now();

        $nextYear = AnneeScolaire::where('annee', '=', $aujourdHui->year . '-' . $aujourdHui->year + 1)->first();



        if ($nextYear) {
            $nom_promotion_actuelle = intval($promotion->nom);
            foreach ($eleves_id as $id) {
                $eleve = Eleve::find($id);


                if ($nom_promotion_actuelle > 3) {
                    $nom_promotion_suiv = $nom_promotion_actuelle - 1;
                    $promotion_suiv = Promotion::where('annee_scolaire_id', $nextYear->id)->where('nom', strval($nom_promotion_suiv))->first();
                    $classe_suiv_pass = $promotion_suiv->classes[0];
                    if (!in_array($eleve->id, $classe_suiv_pass->eleves->pluck('id')->toArray())) {
                        $eleve->classes()->attach($classe_suiv_pass);
                        $eleve->update([
                            'redoublant' => false
                        ]);
                    } else {
                        return redirect()->to($url)->with('notification', ['type' => 'warning', 'message' => 'L\'élève est déjà passé en classe supérieure']);
                    }
                    $temp_promotion_suiv = Promotion::where('annee_scolaire_id', $nextYear->id)->where('nom', strval($nom_promotion_actuelle))->first();
                    $temp_classe_suiv_pass = $temp_promotion_suiv->classes[0];

                    if (in_array($eleve->id, $temp_classe_suiv_pass->eleves->pluck('id')->toArray())) {
                        $eleve->classes()->detach($temp_classe_suiv_pass);
                    }
                } else {
                    return redirect()->to($url)->with('notification', ['type' => 'warning', 'message' => 'Le passage en classe supérieure est impossible pour les élèves de 3ème']);
                }
            }

            return redirect()->to($url)->with('notification', ['type' => 'success', 'message' => 'Passage des élèves validé avec succès']);
        } else {
            return redirect()->to($url)->with('notification', ['type' => 'warning', 'message' => 'Impossible de faire passer les élèves en classe supérieure, l\'année scolaire n\'est pas pas terminée']);
        }
    }

    public function export(Classe $classe)
    {
        return Excel::download(new ElevesExport, $classe->nom . '.xlsx');
    }

    public function importPage(Classe $classe)
    {
        $data = [
            'classe' => $classe
        ];

        return view('eleve.import.form', $data);
    }

    public function import(Request $request)
    {
        $url = url()->previous();
        Excel::import(new ElevesImport, $request->file('excel'));
        return redirect()->to($url)->with('notification', ['type' => 'success', 'message' => 'Élèves importés']);
    }

    public function template()
    {
        return Storage::download('templates/template_eleves.xlsx');
    }
}
