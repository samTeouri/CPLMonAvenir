<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use App\Models\Eleve;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $anneCourante = AnneeScolaire::getAnneeScolaire();
        $promotions = $anneCourante->promotions;

        // calcul du nombre d'élèves inscrits au cours de l'année scolaire actuelle



        $nbre_eleves = 0;
        foreach ($promotions as $promotion) {
            foreach ($promotion->classes as $classe) {
                //ddd($classe->eleves);
                $nbre_eleves += count($classe->eleves);
            }
        }

        $data = [
            'anneeCourante' => $anneCourante,
            'nbre_eleves' => $nbre_eleves,
        ];

        return view('index', $data);
    }
}
