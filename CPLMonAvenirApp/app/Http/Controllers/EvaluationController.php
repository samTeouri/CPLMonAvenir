<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\Promotion;
use App\Models\Trimestre;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    //
    public function choixMatiere(Promotion $promotion)
    {

        // on récupère toutes les matières du niveau
        $matieres = $promotion->matieres;

        $data = [
            'promotion' => $promotion,
            'matieres' => $matieres
        ];

        return view('evaluation.liste_matieres', $data);
    }

    public function choixMatiereViewEvaluation(Promotion $promotion)
    {
        // on récupère toutes les matières du niveau
        $matieres = $promotion->matieres;

        $data = [
            'promotion' => $promotion,
            'matieres' => $matieres
        ];

        return view('evaluation.view.liste_matieres', $data);
    }

    // listes des évaluations dans la matière au cours du trimestre selectionné
    public function index(Promotion $promotion, Matiere $matiere, Trimestre $trimestre)
    {
        // tableau contenant les évaluations du cours dans la matière donnée
        $tab_evaluations = [];

        $classes = $promotion->classes;

        // récupération des évaluations dans la matière donnée dans toutes les classes
        foreach ($classes as $classe) {
            foreach ($classe->cours as $cour) {
                if ($cour->matiere->id === $matiere->id) {
                    foreach ($cour->evaluations as $evaluation) {
                        array_push($tab_evaluations, $evaluation);
                    }
                }
            }
        }


        // tableau contenant les évaluations du trimestre dans le cours
        $evaluation_trimestre = [];

        // tri des evaluations du trimestre concerné en fonction du trimestre de l'une des notes dans l'évaluation donnée
        foreach ($tab_evaluations as $evaluation) {
            if (($evaluation->notes[0]->trimestre_id === $trimestre->id) && ($evaluation->type === 'devoir' || 'composition')) {
                array_push($evaluation_trimestre, $evaluation);
            }
        }





        $data = [
            'evaluations' => $evaluation_trimestre,
            'promotion' => $promotion,
            'matiere' => $matiere,
            'trimestre' => $trimestre,
        ];

        return view('evaluation.view.index', $data);
    }


    public function show(Evaluation $evaluation, Trimestre $trimestre, Promotion $promotion)
    {

        $data = [
            'trimestre' => $trimestre,
            'promotion' => $promotion,
            'evaluation' => $evaluation
        ];



        return view('evaluation.view.show', $data);
    }



    // page de création d'une évaluation
    public function create(Promotion $promotion, Matiere $matiere, Trimestre $trimestre)
    {

        $tab_classes = [];
        // recupération ds classes et des cours

        $classes = $promotion->classes;

        foreach ($classes as $classe) {
            foreach ($classe->cours as $cour) {
                if ($cour->matiere->id === $matiere->id) {
                    array_push($tab_classes, ['classe' => $classe, 'cours' => $cour, 'eleves' => $classe->eleves->sortBy('nom')]);
                }
            }
        }


        $data = [
            'promotion' => $promotion,
            'classes' => $tab_classes,
            'matiere' => $matiere,
            'trimestre' => $trimestre,
        ];

        return view('evaluation.create', $data);
    }


    // Création des évaluations
    public function store(Request $request)
    {


        $trimestre = Trimestre::find($request->trimestre_id);

        // Récupérer les notes pour chaque élève
        $eleves = $request->input('eleves');

        // Tableau pour stocker les IDs de cours uniques
        $idsCours = [];

        foreach ($request->eleves as $eleve) {
            // Ajouter l'ID de cours au tableau
            $idsCours[] = $eleve['cours_id'];
        }



        // Récupérer les IDs de cours de manière unique
        $idsCoursUniques = array_unique($idsCours);

        $tab_cours = [];
        foreach ($idsCoursUniques as $id) {
            $cours = Cours::find($id);
            array_push($tab_cours, $cours);
        }



        $tab_evaluations = [];

        // Exemple de traitement des données
        foreach ($tab_cours as $cours) {
            $evaluation = Evaluation::create([
                'intitule' => $request->intitule . ' ' . $cours->classe->nom . ' ' . substr(
                    $trimestre->intitule,
                    0,
                    11
                ),
                'type' => $request->type,
                'note_maximale' => $request->note_maximale,
                'date' => $request->date,
                'cours_id' => $cours->id
            ]);
            array_push($tab_evaluations, $evaluation);
        }

        foreach ($tab_evaluations as $evaluation) {
            foreach ($eleves as $eleve) {
                if (intval($eleve['cours_id']) === $evaluation->cours_id) {
                    //ddd('note');
                    $note = Note::create([
                        'valeur' => floatval($eleve['note']),
                        'evaluation_id' => $evaluation->id,
                        'trimestre_id' => $request->trimestre_id,
                        'eleve_id' => intval($eleve['eleve_id'])
                    ]);
                    $eleve_model = Eleve::find($eleve['eleve_id']);
                    $evaluation->notes()->save($note);
                    $eleve_model->notes()->save($note);
                    $trimestre->notes()->save($note);
                }
            }
        }

        $trimestre = Trimestre::find($request->trimestre_id);



        return redirect()->route('evaluation.create', ['promotion' => $trimestre->promotion->id, 'matiere' => $tab_cours[0]->matiere->id, 'trimestre' => $trimestre->id])->with('notification', ['type' => 'success', 'message' => 'Evaluation créée avec succès']);
    }


    // mise à jour des notes d'une évaluation et de l'évaluation
    public function update(Request $request, Evaluation $evaluation, Trimestre $trimestre)
    {
        $evaluation->update([
            'intitule' =>
            $request->intitule . ' ' . $evaluation->cours->classe->nom . ' ' . substr(
                $trimestre->intitule,
                0,
                11
            ),
            'date' => $request->date,
            'type' => $request->type,
            'note_maximale' => $request->note_maximale
        ]);

        $notes = $request->notes;



        foreach ($notes as $note) {
            $old_note = Note::find($note['note_id']);
            $old_note->update([
                'valeur' => $note['valeur']
            ]);
            $old_note->save();
        }


        return redirect()->route('evaluation.show', ['evaluation' => $evaluation->id, 'trimestre' => $trimestre->id, 'promotion' => $evaluation->cours->classe->promotion->id])->with('notification', ['type' => 'success', 'message' => 'Evaluation et notes mises à jour avec succès']);
    }
}
