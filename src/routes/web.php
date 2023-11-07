<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
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
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => '/admin'], function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    /* Routes pour les classes */
    Route::get('/classes-by-niveau/{niveau}', [ClasseController::class, 'getClassesByNiveau']);

    /* Routes pour les niveaux */
    Route::get('/niveau-by-classe/{classe}', [NiveauController::class, 'getNiveauByClasse']);

    /* Routes pour les élèves */
    Route::group(['prefix' => '/eleves'], function() {
        Route::get('/create', [EleveController::class, 'create'])->name('eleves.create');
        Route::get('/index', [EleveController::class, 'index'])->name('eleves.index');
        Route::post('/store', [EleveController::class, 'store'])->name('eleves.store');
    });
});
