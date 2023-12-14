<?php

namespace App\Http\Controllers;

use App\Models\Assiduite;
use App\Models\Classe;
use App\Models\Retard;
use Illuminate\Http\Request;

class RetardController extends Controller
{
    //
    public function index(Assiduite $assiduite, Classe $classe)
    {
        $data = [
            'assiduite' => $assiduite,
            'classe' => $classe,
        ];

        return view('retard.index', $data);
    }

    public function create(Assiduite $assiduite, Classe $classe)
    {
        $data = [
            'assiduite' => $assiduite,
            'classe' => $classe,
        ];

        return view('retard.create', $data);
    }

    public function store(Request $request, Classe $classe)
    {


        $retard = Retard::create($request->all());

        return redirect()->route('retard.index', ['assiduite' => $retard->assiduite->id, 'classe' => $classe->id])->with('notification', ['type' => 'success', 'message' => 'Retard bien enregistré']);
    }

    public function destroy(Retard $retard)
    {
        $url = url()->previous();

        $retard->delete();

        return redirect()->to($url)->with('notification', ['type' => 'error', 'message' => 'Retard supprimé']);
    }
}
