<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\AssiduiteController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaTexToPDFController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\RetardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Routes d'authentification */

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});





Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');




    // Routes concernant les professeurs
    Route::controller(ProfesseurController::class)->group(function () {
        Route::prefix('/professeurs')->group(function () {
            Route::get('/liste-des-enseignants', 'index')->name('professeur.index');
            Route::get('/ajouter-un-enseignant', 'create')->name('professeur.create');
            Route::post('/ajouter-un-enseignant', 'store')->name('professeur.store');
            Route::get('/modifier-informations/{professeur}', 'edit')->name('professeur.edit');
            Route::post('/modifier-informations/{professeur}', 'update')->name('professeur.update');
            Route::delete('/supprimer-enseignant/{professeur}', 'destroy')->name('professeur.destroy');
        });
    });



    // Routes concernant les matières
    Route::controller(MatiereController::class)->group(function () {
        Route::prefix('/matiere')->group(function () {
            Route::get('/liste-des-matieres', 'index')->name('matiere.index');
            Route::get('/ajouter-une-matiere', 'create')->name('matiere.create');
            Route::post('/ajouter-une-matiere', 'store')->name('matiere.store');
            Route::get('/modifier-matiere/{matiere}', 'edit')->name('matiere.edit');
            Route::post('/modifier-matiere/{matiere}', 'update')->name('matiere.update');
            Route::delete('/supprimer-matiere/{matiere}', 'destroy')->name('matiere.delete');
        });
    });


    // Routes concernant les élèves
    Route::controller(EleveController::class)->group(function () {
        Route::prefix('/eleve')->group(function () {
            Route::get('/ajouter-un-eleve', 'create')->name('eleve.create');
            Route::post('/ajouter-un-eleve', 'store')->name('eleve.store');
            Route::get('/modifier-informations/{eleve}/classe/{classe}', 'edit')->name('eleve.edit');
            Route::post('/modifier-informations/{eleve}', 'update')->name('eleve.update');
            Route::post('/passage-année-supérieure/{classe}', 'passageAnneeSup')->name('eleve.passage');
            Route::get('/details/{eleve}', 'show')->name('eleve.show');
            Route::delete('/supprimer/{eleve}', 'destroy')->name('eleve.destroy');
            Route::get('/export-eleves/classe/{classe}', 'export')->name('eleves.export');
            Route::get('/import-eleves/classe/{classe}', 'importPage')->name('eleves.importPage');
            Route::post('/import-eleves', 'import')->name('eleves.import');
            Route::get('/download-template', 'template')->name('eleves.template');
        });
    });


    //Routes concernant l'assiduité de l'élève 
    Route::controller(AssiduiteController::class)->group(function () {
        Route::prefix('/assiduite')->group(function () {
            Route::get('/liste-des avertissements/{eleve}/classe/{classe}', 'index')->name('assiduite.index');
            Route::get('/ajouter-avertissement/eleve/{eleve}/trimestre/{trimestre}', 'create')->name('assiduite.create');
            Route::post('/ajouter-avertissement/eleve/{eleve}/trimestre/{trimestre}', 'store')->name('assiduite.store');
            Route::get('/modifier-avertissement/{assiduite}', 'edit')->name('assiduite.edit');
            Route::post('/modifier-avertissement/{assiduite}', 'update')->name('assiduite.update');
            Route::get('/comportement-de-l-eleve/{assiduite}/classe/{classe}', 'editComportement')->name('comportement.edit');
            Route::post('/comportement-de-l-eleve/{assiduite}', 'updateComportement')->name('comportement.update');
        });
    });


    //Routes concernant les retards de l'élève
    Route::controller(RetardController::class)->group(function () {
        Route::prefix('/retard')->group(function () {
            Route::get('/liste-des-retards/{assiduite}/classe/{classe}', 'index')->name('retard.index');
            Route::get('/ajouter-un-retard/{assiduite}/classe/{classe}', 'create')->name('retard.create');
            Route::post('/ajouter-un-retard/{classe}', 'store')->name('retard.store');
            Route::delete('/supprimer-un-retard/{retard}', 'destroy')->name('retard.destroy');
        });
    });

    //Routes concernant les retards de l'élève
    Route::controller(AbsenceController::class)->group(function () {
        Route::prefix('/absence')->group(function () {
            Route::get('/liste-des-absence/{assiduite}/classe/{classe}', 'index')->name('absence.index');
            Route::get('/ajouter-une-absence/{assiduite}/classe/{classe}', 'create')->name('absence.create');
            Route::post('/ajouter-une-absence/{classe}', 'store')->name('absence.store');
            Route::delete('/supprimer-une-absence/{absence}', 'destroy')->name('absence.destroy');
        });
    });



    // Routes concernant les classes
    Route::controller(ClasseController::class)->group(function () {
        Route::prefix('/classe')->group(function () {
            Route::get('/ajouter-une-classe/promotion/{promotion}', 'listeClasses')->name('classe.list');
            Route::get('/ajouter-une-classe/{promotion}', 'create')->name('classe.create');
            Route::post('/ajouter-une-classe', 'store')->name('classe.store');
            Route::get('/liste-des-eleves/{classe}', 'index')->name('classe.index');
            Route::delete('/supprimer/classe/{classe}', 'destroy')->name('classe.destroy');
        });
    });


    // Routes concernant les évaluations
    Route::controller(EvaluationController::class)->group(function () {
        Route::prefix('/evaluation')->group(function () {
            Route::get('/ajout-evaluation/{promotion}/{matiere}/{trimestre}', 'create')->name('evaluation.create');
            Route::get('/ajout-interrogation/{classe}/cours/{cours}/trimestre/{trimestre}', 'createInterrogation')->name('evaluation.create.interrogation');
            Route::post('/ajout-evaluation', 'store')->name('evaluation.store');
            Route::get('/ajout-evaluation/matieres/{promotion}', 'choixMatiere')->name('evaluation_matieres');
            Route::get('/liste-evaluations/matieres/{promotion}', 'choixMatiereViewEvaluation')->name('view_evaluation_matieres');
            Route::get('/liste-des-evaluations/{promotion}/{matiere}/{trimestre}', 'index')->name('evaluation.index');
            Route::get('/details-evaluation/{evaluation}/trimestre/{trimestre}/niveau/{promotion}', 'show')->name('evaluation.show');
            Route::post('/mise-a-jour/{evaluation}/trimestre/{trimestre}', 'update')->name('evaluation.update');
            Route::get('/ajout-interrogation/cours/classe/{classe}', 'choixCours')->name('interrogation.cours');
            Route::get('/liste-interrogations/classe/{classe}', 'choixCoursViewInterrogation')->name('view_interrogation_cours');
            Route::get('/liste-des-interrogations/classe/{classe}/cours/{cours}/trimestre{trimestre}', 'indexInterrogation')->name('interrogation.index');
            Route::delete('/supprimer/evaluation/{evaluation}', 'destroy')->name('evaluation.destroy');
        });
    });


    // Routes concernant l'année scolaire
    Route::controller(AnneeScolaireController::class)->group(function () {


        // Méthode AJAX
        Route::get('/changeYear/{anneeScolaire}', 'changeAppCurrentYear')->name('changeYear');
    });

    // Routes concernant les cours
    Route::controller(CoursController::class)->group(function () {
        Route::prefix('/cours')->group(function () {
            Route::get('/classe/{classe}', 'index')->name('cours.index');
            Route::get('/{cours}', 'show')->name('cours.show');
            Route::post('/update/{cours}', 'update')->name('cours.update');
        });
    });





    //Route pour la génération de documents
    Route::controller(LaTexToPDFController::class)->group(function () {
        Route::get('/liste-eleves/classe/{classe}', 'listesDesEleves')->name('listeDesEleves');
        Route::get('/fiche-informations-eleve/{eleve}', 'informationsEleve')->name('eleve.info');
        Route::get('/fiche-informations-eleve/classe/{classe}', 'informationsEleveAll')->name('eleve.classe.info');
        Route::get('/bulletin/eleve/{eleve}/classe/{classe}/{trimestre}', 'bulletinTrimestre')->name('eleve.bulletin');
        Route::get('/bulletins-du-trimestre/classe/{classe}/trimestre/{trimestre}', 'bulletinsTrimestreClasse')->name('classe.bulletins');
    });
});
