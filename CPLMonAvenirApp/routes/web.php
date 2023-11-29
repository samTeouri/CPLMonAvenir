<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\HomeController;
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



    // Routes concernant les évaluations
    Route::controller(EvaluationController::class)->group(function () {
        Route::prefix('/evaluation')->group(function () {
            Route::get('/add/niveau/matiere/trimestre/{promotion}/{matiere}/{trimestre}', 'create')->name('evaluation.create');
            Route::post('/add/nouvelleEvaluation', 'store')->name('evaluation.store');
            Route::get('/add/niveau/matieres/{promotion}', 'choixMatiere')->name('evaluation_matieres');
            Route::get('/liste/niveau/matieres/{promotion}', 'choixMatiereViewEvaluation')->name('view_evaluation_matieres');
            Route::get('/liste/index/niveau/matieres/{promotion}/{matiere}/{trimestre}', 'index')->name('evaluation.index');
            Route::get('/details/{evaluation}/trimestre/{trimestre}/niveau/{promotion}', 'show')->name('evaluation.show');
            Route::post('/update/{evaluation}/trimestre/{trimestre}', 'update')->name('evaluation.update');
        });
    });


    // Routes concernant l'année scolaire
    Route::controller(AnneeScolaireController::class)->group(function () {


        // Méthode AJAX
        Route::get('/changeYear/{anneeScolaire}', 'changeAppCurrentYear')->name('changeYear');
    });
});
