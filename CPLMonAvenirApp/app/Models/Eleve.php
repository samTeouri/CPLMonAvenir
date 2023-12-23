<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'contact_tuteur',
        'matricule',
        'sexe',
        'lieu_naissance',
        'profil',
        'adresse',
        'pere',
        'mere',
        'sante',
    ];

    protected $cast = [
        'contact_tuteur' => 'json',
        'pere' => 'json',
        'mere' => 'json',
        'sante' => 'json',
    ];




    // calcul de la moyenne  en classe et composition d'un étudiant dans un cours dans un trimestre donné
    public function getMoyenneCours($id_cours, $id_trimestre)
    {
        $cours = Cours::with(['evaluations.notes' => function ($query) use ($id_trimestre) {
            $query->where('trimestre_id', $id_trimestre);
        }])
            ->find($id_cours);

        $notes_classes = [];

        // on parcours toutes les évaluations du cours pour rechercher les évaluations dans lesquelles l'élève à composé au cours du trimestre 
        // puis on récupère la note
        foreach ($cours->evaluations as $evaluation) {
            if (in_array($evaluation->type, ['devoir', 'interrogation'])) {
                foreach ($evaluation->notes->where('eleve_id', $this->id) as $note) {
                    array_push($notes_classes, $note);
                }
            }
        }


        $somme_notes = 0;

        foreach ($notes_classes as $note) {
            // passage à 20 de la note dans le cas où le barême est inférieur à 20
            if ($note->evaluation->note_maximale < 20) {
                $note_sur_20 = (20 * $note->valeur) / $note->evaluation->note_maximale;
                $somme_notes += $note->valeur;
            } else {
                $somme_notes += $note->valeur;
            }
        }

        $nbre_notes = 1;
        if (count($notes_classes) != 0) {
            $nbre_notes = count($notes_classes);
        }

        // calcul de la moyenne de classe
        $moyenne_matiere = ['moyenne_classe' => round($somme_notes / $nbre_notes, 2)];

        $note_composition = 0;

        // on parcours toutes les évaluations du cours pour rechercher les évaluations dans lesquelles l'élève à composé au cours du trimestre 
        // puis on récupère la note
        foreach ($cours->evaluations as $evaluation) {
            if (($evaluation->type === 'composition')) {
                $note_composition = $evaluation->notes->where('eleve_id', $this->id)->pluck('valeur')->first() * 1;
            }
        }

        $moyenne_matiere['compo'] = $note_composition;

        $moyenne_matiere['cours'] = $cours;

        return $moyenne_matiere;
    }


    public function getMoyenneTrimestrielle($classe_id, $trimestre_id)
    {
        $classe = Classe::with('cours')->find($classe_id);

        $cours = $classe->cours;

        // tableau contenant l'ensemble des moyennes dans chaque cours au cours du trimestre
        $liste_moyennes = [];

        // calcul de la moyenne de l'étudiant dans chaque cours
        foreach ($cours as $cour) {
            array_push($liste_moyennes, $this->getMoyenneCours($cour->id, $trimestre_id));
        }

        // calcul de moyenne trimestrielle
        $total_moyenne = 0;
        $total_coefficients = 0;
        foreach ($liste_moyennes as $moyenne) {
            $total_moyenne += (($moyenne['moyenne_classe'] + $moyenne['compo']) / 2) * $moyenne['cours']->coefficient;
            $total_coefficients += $moyenne['cours']->coefficient;
        }

        $moyenne_trimestre = round($total_moyenne / $total_coefficients, 2);
        return $moyenne_trimestre;
    }


    public function rangTrimestre($trimestre_id, $classe_id)
    {
        $classe = Classe::with('eleves')->find($classe_id);

        $trimestre = Trimestre::find($trimestre_id);

        $moyenne_eleve = $this->getMoyenneTrimestrielle($classe->id, $trimestre->id);

        $moyennes = [];
        foreach ($classe->eleves as $eleve) {
            array_push($moyennes, $eleve->getMoyenneTrimestrielle($classe->id, $trimestre->id));
        }

        arsort($moyennes);

        if ($moyenne_eleve === 0.0) {
            return count($classe->eleves);
        }

        $rang = 0;
        foreach ($moyennes as $moyenne) {
            $rang++;
            if ($moyenne_eleve === $moyenne) {
                return $rang;
            }
        }
    }


    public function rangAnnuel($classe_id)
    {
        $classe = Classe::with(['promotion.trimestres', 'eleves'])->find($classe_id);


        $moyenne_annuelle_eleve = 0.0;
        foreach ($classe->promotion->trimestres as $trimestre) {
            $moyenne_annuelle_eleve += $this->getMoyenneTrimestrielle($classe->id, $trimestre->id);
        }

        $moyenne_annuelle_eleve /= 3;

        $moyennes = [];
        foreach ($classe->eleves as $eleve) {
            $moyenne_annuelle = 0.0;
            foreach ($classe->promotion->trimestres as $trimestre) {
                $moyenne_annuelle += $eleve->getMoyenneTrimestrielle($classe->id, $trimestre->id);
            }
            array_push($moyennes, round($moyenne_annuelle / 3, 2));
        }


        arsort($moyennes);


        if (round($moyenne_annuelle_eleve, 2) === 0.0) {
            return count($classe->eleves);
        }

        $rang = 0;
        foreach ($moyennes as $moyenne) {
            $rang++;
            if (round($moyenne_annuelle_eleve, 2) === $moyenne) {
                return $rang;
            }
        }
    }


    public function classes()
    {
        return $this->belongsToMany(Classe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assiduites()
    {
        return $this->hasMany(Assiduite::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
