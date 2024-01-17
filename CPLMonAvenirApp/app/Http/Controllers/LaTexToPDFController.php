<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Trimestre;
use Illuminate\Http\Request;
use Ismaelw\LaraTeX\LaraTeX;
use Rmunate\Utilities\SpellNumber;

class LaTexToPDFController extends Controller
{


    // fonction donnant en format PDF la liste des élèves de la classe
    public function listesDesEleves(Classe $classe)
    {
        $data = [
            'eleves' => $classe->eleves->sortBy('nom'),
            'classe' => $classe,
            'annee' => $classe->promotion->anneeScolaire,
            'logo' => public_path('assets/images/logo2.png')
        ];

        return (new LaraTeX('latex.liste-eleves'))->with($data)->inline('liste_des_eleves_' . substr($classe->nom, 0, 6) . '.pdf');
    }


    // fonction générant la fiche d'information de l'élève 
    public function informationsEleve(Eleve $eleve)
    {

        $data = [
            'eleve' => $eleve,
            'logo' => public_path('assets/images/logo2.png'),
            'photo_passeport' => public_path('assets/media/avatars/avatar1.jpg')
        ];

        return (new LaraTeX('latex.informationEleve'))->with($data)->inline('fiche_information_' . $eleve->nom .  '_' . $eleve->prenom);
    }


    // fonction générant les fiches d'informations des l'élève s de la classe
    public function informationsEleveAll(Classe $classe)
    {

        $data = [
            'eleves' => $classe->eleves->sortBy('nom'),
            'logo' => public_path('assets/images/logo2.png'),
        ];

        return (new LaraTeX('latex.informationEleveClasse'))->with($data)->inline('fiche_informations_' . $classe->nom);
    }

    public function bulletinTrimestre(Eleve $eleve, Classe $classe, Trimestre $trimestre)
    {

        $cours = $classe->cours;

        $lignes_bulletin = [];
        foreach ($cours as $cour) {
            $ligne = [];
            $ligne['notes_cours'] = $eleve->getMoyenneCours($cour->id, $trimestre->id);
            array_push($lignes_bulletin, $ligne);
        }


        $moyennes_classe_trimestres = [];
        foreach ($classe->promotion->trimestres as $temp_trimestre) {
            $moyennes_classe_trimestres[$temp_trimestre->id] = [];
        }

        foreach ($classe->eleves as $temp_eleve) {
            foreach ($classe->promotion->trimestres as $temp_trimestre) {
                array_push($moyennes_classe_trimestres[$temp_trimestre->id], [
                    'moyenne' => $temp_eleve->getMoyenneTrimestrielle($classe->id, $temp_trimestre->id),
                    'eleve_id' => $temp_eleve->id,
                ]);
            }
        }

        foreach ($moyennes_classe_trimestres as &$trimestreData) {
            usort($trimestreData, function ($a, $b) {
                return $b['moyenne'] <=> $a['moyenne'];
            });
        }
        unset($trimestreData);




        $moyennes = [];
        $eleveId = $eleve->id;
        foreach ($classe->promotion->trimestres as $temp_trimestre) {
            foreach ($moyennes_classe_trimestres[$temp_trimestre->id] as $index => $item) {
                if ($item['eleve_id'] === $eleveId) {
                    $moyennes[$temp_trimestre->id] = [
                        'rang' => $index + 1,
                        'moyenne' => $item['moyenne'],
                        'eleve_id' => $item['eleve_id'],
                    ];
                }
            }
        }

        $moyennes[$trimestre->id]['moyenne'] = 7.50;

        if ($moyennes[$trimestre->id]['moyenne'] === 0.0) {
            $moyenne_lettre = 'Zéro';
        } else {
            $moyenne_lettre = SpellNumber::value($moyennes[$trimestre->id]['moyenne'])->locale('fr')->toLetters(); 
        }

        $moyenne_annuelle = 0.0;
        foreach ($moyennes as $moyenne) {
            $moyenne_annuelle += $moyenne['moyenne'];
        }

        $moyenne_annuelle /= 3;


        $assiduite = $eleve->assiduites->where('trimestre_id', $trimestre->id)->first();





        $data = [
            'lignes' => $lignes_bulletin,
            'moyennes_trimestres' => $moyennes,
            'moyenne_lettre' => $moyenne_lettre,
            'eleve' => $eleve,
            'classe' => $classe,
            'trimestre' => $trimestre,
            'logo' => public_path('assets/images/logo2.png'),
            'moyenne_annuelle' => round($moyenne_annuelle, 2),
            'assiduite' => $assiduite,

        ];




        return (new LaraTeX('latex.bulletin'))->with($data)->inline('bulletin' . $classe->nom . '_' . $eleve->nom . '_' . $eleve->prenom);
    }


    public function bulletinsTrimestreClasse(Classe $classe, Trimestre $trimestre)
    {


        $eleves_classe = $classe->eleves;

        $cours = $classe->cours;

        $bulletins = [];
        foreach ($eleves_classe as $temp_eleve) {
            $bulletin = [];
            $bulletin[$temp_eleve->id] = [];
            $bulletin['eleve_id'] = $temp_eleve->id;
            $bulletin['eleve'] = $temp_eleve;
            foreach ($cours as $cour) {
                $ligne = [];
                $ligne['notes_cours'] = $temp_eleve->getMoyenneCours($cour->id, $trimestre->id);
                array_push($bulletin[$temp_eleve->id], $ligne);
            }
            array_push($bulletins, $bulletin);
        }


        $moyennes_classe_trimestres = [];
        foreach ($classe->promotion->trimestres as $temp_trimestre) {
            $moyennes_classe_trimestres[$temp_trimestre->id] = [];
        }

        foreach ($eleves_classe as $temp_eleve) {
            foreach ($classe->promotion->trimestres as $temp_trimestre) {
                array_push($moyennes_classe_trimestres[$temp_trimestre->id], [
                    'moyenne' => $temp_eleve->getMoyenneTrimestrielle($classe->id, $temp_trimestre->id),
                    'eleve_id' => $temp_eleve->id,
                ]);
            }
        }


        foreach ($moyennes_classe_trimestres as &$trimestreData) {
            usort($trimestreData, function ($a, $b) {
                return $b['moyenne'] <=> $a['moyenne'];
            });
        }
        unset($trimestreData);


        foreach ($bulletins as &$temp_bulletin) {
            foreach ($classe->promotion->trimestres as $temp_trimestre) {
                foreach ($moyennes_classe_trimestres[$temp_trimestre->id] as $index => $item) {
                    if ($item['eleve_id'] === $temp_bulletin['eleve_id']) {
                        $temp_bulletin['moyennes'][$temp_trimestre->id] = [
                            'rang' => $index + 1,
                            'moyenne' => $item['moyenne'],
                            'eleve_id' => $item['eleve_id'],
                        ];
                    }
                }
            }
        }

        unset($temp_bulletin);


        foreach ($bulletins as &$temp_bulletin) {
            if ($temp_bulletin['moyennes'][$trimestre->id]['moyenne'] === 0.0) {
                $temp_bulletin['moyenne_lettres'] = 'Zéro';
            } else {
                $temp_bulletin['moyenne_lettres'] = SpellNumber::float($temp_bulletin['moyennes'][$trimestre->id]['moyenne'])->toLetters();
            }
        }

        unset($temp_bulletin);

        foreach ($bulletins as &$temp_bulletin) {
            $moyenne_annuelle = 0.0;
            $moyenne_annuelle += $temp_bulletin['moyennes'][$trimestre->id]['moyenne'];
            $temp_bulletin['moyenne_annuelle'] = round($moyenne_annuelle / 3, 2);
        }

        unset($temp_bulletin);


        foreach ($bulletins as &$temp_bulletin) {
            $temp_bulletin['assiduite'] = $temp_bulletin['eleve']->assiduites->where('trimestre_id', $trimestre->id)->first();
        }

        unset($temp_bulletin);

        $data = [
            'bulletins' => $bulletins,
            'classe' => $classe,
            'trimestre' => $trimestre,
            'logo' => public_path('assets/images/logo2.png'),
        ];


        return (new LaraTeX('latex.bulletins'))->with($data)->inline('bulletins' . '_' . substr($classe->nom, 0, 6) . '_' . substr($trimestre->intitule, 0, 11));
    }
}
