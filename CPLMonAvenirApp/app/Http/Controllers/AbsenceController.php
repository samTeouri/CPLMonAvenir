<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Assiduite;
use App\Models\Classe;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    //
    public function index(Assiduite $assiduite, Classe $classe)
    {
        $data = [
            'assiduite' => $assiduite,
            'classe' => $classe,
        ];

        return view('absence.index', $data);
    }

    public function create(Assiduite $assiduite, Classe $classe)
    {
        $data = [
            'assiduite' => $assiduite,
            'classe' => $classe,
        ];

        return view('absence.create', $data);
    }

    public function store(Request $request, Classe $classe)
    {


        $absence = Absence::create($request->all());

        return redirect()->route('retard.index', ['assiduite' => $absence->assiduite->id, 'classe' => $classe->id])->with('notification', ['type' => 'success', 'message' => 'Absence bien enregistrée']);
    }

    public function destroy(Absence $absence)
    {
        $url = url()->previous();

        $absence->delete();

        return redirect()->to($url)->with('notification', ['type' => 'error', 'message' => 'Absence supprimé']);
    }
}
