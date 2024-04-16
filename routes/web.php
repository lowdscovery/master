<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\BisList;
use App\Http\Livewire\Caracteristique;
use App\Http\Livewire\Commande;
use App\Http\Livewire\Incident;
use App\Http\Livewire\Information;
use App\Http\Livewire\Intervenant;
use App\Http\Livewire\Maintenance;
use App\Http\Livewire\Uploads;
use App\Http\Livewire\Utilisateurs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([
    "middleware" => ["auth", "auth.manager"],
    'as' => 'manager.'
], function(){

    Route::group([
        "prefix" => "habilitations",
        'as' => 'habilitations.'
    ], function(){

        Route::get("/utilisateurs", Utilisateurs::class)->name("users.index")->middleware("auth.manager");
    });
});

//
Route::group([
    "middleware" => ["auth", "auth.manager"],
    'as' => 'manager.'
], function(){

    Route::group([
        "prefix" => "caracteristiques",
        'as' => 'caracteristiques.'
    ], function(){

        Route::get("/moteurs", Caracteristique::class)->name("caracteristique.caracteristique")->middleware("auth.manager");
    });
});
//
Route::get("/intervenants", Intervenant::class)->name("Intervenant.intervenant")->middleware("auth.manager");
Route::get("/incidents", Incident::class)->name("Incident.incident")->middleware("auth.manager");
Route::get("/uploads", Uploads::class)->name("uploads")->middleware("auth.manager");
Route::get("/maintenances", Maintenance::class)->name("maintenance.maintenance")->middleware("auth.manager");
Route::get("/commandes", Commande::class)->name("commande.commande")->middleware("auth.manager");
Route::get("bis", BisList::class)->name("bis.bis")->middleware("auth.manager");

/* voir information de php
route::get('/teste/page', function(){
    dd(phpinfo());
});*/



