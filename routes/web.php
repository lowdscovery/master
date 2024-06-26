<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Affichage;
use App\Http\Livewire\Armoire;
use App\Http\Livewire\Bande;
use App\Http\Livewire\BisList;
use App\Http\Livewire\Caracteristique;
use App\Http\Livewire\Commande;
use App\Http\Livewire\Incident;
use App\Http\Livewire\Information;
use App\Http\Livewire\Intervenant;
use App\Http\Livewire\Maintenance;
use App\Http\Livewire\Mesure;
use App\Http\Livewire\Ouvrage;
use App\Http\Livewire\Calcules;
use App\Http\Livewire\Rapport;
use App\Http\Livewire\Teste;
use App\Http\Livewire\Uploads;
use App\Http\Livewire\Utilisateurs;
use App\Models\CaracteristiqueMoteur;
use App\Models\Forage;
use App\Models\Ouvrage as ModelsOuvrage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
Route::group([
    "middleware" => ["auth", "auth.manager"],
    'as' => 'manager.'
], function(){

    Route::group([
        "prefix" => "tableau",
        'as' => 'tableau.'
    ], function(){

        Route::get("/bandes", Bande::class)->name("bande.bande")->middleware("auth.manager");
    });
});
//
Route::get("/intervenants", Intervenant::class)->name("Intervenant.intervenant")->middleware("auth.manager");
Route::get("/incidents", Incident::class)->name("Incident.incident")->middleware("auth.manager");
Route::get("/uploads", Uploads::class)->name("uploads")->middleware("auth.manager");
Route::get("/tes", Teste::class)->name("teste")->middleware("auth.manager");
Route::get("/maintenances", Maintenance::class)->name("maintenance.maintenance")->middleware("auth.manager");
Route::get("/commandes", Commande::class)->name("commande.commande")->middleware("auth.manager");
Route::get("/bis", BisList::class)->name("bis.bis")->middleware("auth.manager");
Route::get("/mesures", Mesure::class)->name("mesure.mesure")->middleware("auth.manager");
Route::get("/rapports", Rapport::class)->name("rapport.rapport")->middleware("auth.manager");
Route::get("/armoires", Armoire::class)->name("armoire.armoire")->middleware("auth.manager");
Route::get("/calcule", Calcules::class)->name("calcules")->middleware("auth.manager");
//Route::get("/Affichage", Affichage::class)->name("affichage.affichage")->middleware("auth.manager");

Route::group([
    "middleware" => ["auth", "auth.manager"],
    'as' => 'manager.'
], function(){

    Route::group([
        "prefix" => "caracteristiques",
        'as' => 'caracteristiques.'
    ], function(){

        Route::get("/forages", Ouvrage::class)->name("ouvrage.ouvrage")->middleware("auth.manager");
    });
});


//Route::get("/notify",[App\Http\Controllers\HomeController::class, 'notify']);
Route::get("/markasred/{id}",[App\Http\Controllers\HomeController::class, 'markasred'])->name('markasred');
//Route::get("/markasred",Utilisateurs::class)->name('markasred')->middleware("auth.manager");

/* voir information de php
route::get('/teste/page', function(){
    dd(phpinfo());
});*/
// teste relation
/*Route::get('/teste', function(){
return Forage::with("ressources")->paginate(1);
});*/

/*Route::get('/teste',function(){
    return ModelsOuvrage::with("ressource")->paginate(2);
});*/

