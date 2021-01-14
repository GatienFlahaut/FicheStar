<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route utilisateur pour la version mobile
Route::domain('mob.fiche-star')->group(function () {
    Route::get('/', 'App\Http\Controllers\IdentiteController@show')->name('star');
});

//Route utilisateur pour la version PC / Tablette
Route::get('/', 'App\Http\Controllers\IdentiteController@show')->name('star');


//Routes Back-office


// Routes de redirection et d'authentification
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/back/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route d'affichage de donnée
Route::get('/back/index_fiche', 'App\Http\Controllers\IdentiteController@index')->middleware('auth')->name('indexFiche');

// Route d'ajout de données
Route::post('/back/ajouter_fiche', 'App\Http\Controllers\IdentiteController@store')->name('ajouterFiche');

// Route d'édition de données
Route::post('/back/modifier_fiche', 'App\Http\Controllers\IdentiteController@update')->name('modifierFiche');

//Route de suppression de données
Route::get('/back/supprimer_fiche/{id}', 'App\Http\Controllers\IdentiteController@destroy')->name('supprimerFiche');