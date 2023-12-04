<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaTexToPDFController;
use App\Http\Controllers\NiveauController;
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



    // Routes concernant les élèves
    Route::controller(EleveController::class)->group(function () {
        Route::prefix('/eleve')->group(function () {
            Route::get('/details/{eleve}', 'show')->name('eleve.show');
            Route::delete('/supprimer/{eleve}', 'destroy')->name('eleve.destroy');
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



    //Route pour la génération de documents
    Route::controller(LaTexToPDFController::class)->group(function () {
        Route::get('/liste-eleves/classe/{classe}', 'listesDesEleves')->name('listeDesEleves');
        Route::get('/fiche-informations-eleve/{eleve}', 'informationsEleve')->name('eleve.info');
    });
});
