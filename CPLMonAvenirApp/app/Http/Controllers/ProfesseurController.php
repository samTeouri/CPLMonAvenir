<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    //


    public function destroy(Professeur $professeur)
    {
        $url = url()->previous();

        $cours = $professeur->cours;

        foreach ($cours as $cour) {
            $cour->update([
                'professeur_id' => null,
            ]);
        }

        $professeur->delete();

        return redirect()->to($url)->with('notification', ['type' =>  'success', 'message' =>  "L'enseignant à été supprimé"]);
    }
}
