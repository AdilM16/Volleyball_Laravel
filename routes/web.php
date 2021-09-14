<?php

use App\Http\Controllers\ContinentController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    $joueurs=Joueur::all();
    $count=0;
    $equipes=Equipe::all();
    return view('home', compact('count', 'joueurs','equipes'));
});

Route::resource('equipe', EquipeController::class);

Route::resource('continent', ContinentController::class);

Route::resource('joueur',JoueurController::class);

Route::get('/equipe', function () {
    $equipes = Equipe::all();
    return view('pages.equipes.allequipes', compact('equipes'));
});

Route::get('/equipe/{id}/show', [EquipeController::class, 'show']);

Route::get('/joueur/{id}/show', function ($id) {
    $joueurs = Joueur::find($id);
    return view('pages.joueurs.joueursshow', compact('joueurs'));
});