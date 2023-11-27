<?php

use App\Http\Controllers\AnneeScolaireController;
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
    return view('auth.login');
});





Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');



    // Routes concernant l'année scolaire
    Route::controller(AnneeScolaireController::class)->group(function () {


        // Méthode AJAX
        Route::get('/changeYear/{anneeScolaire}', 'changeAppCurrentYear')->name('changeYear');
    });
});
