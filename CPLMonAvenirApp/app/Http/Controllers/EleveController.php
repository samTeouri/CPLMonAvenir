<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    //


    public function destroy(Eleve $eleve)
    {
        $url = url()->previous();
        $eleve->delete();
        return redirect()->to($url)->with('notification', ['type' => 'danger', 'message' => 'Elève supprimé']);
    }
}
