<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\AddDistricts;
use App\Http\Livewire\AddForage;
use App\Http\Livewire\AddSite;
use App\Http\Livewire\AddType;
use App\Http\Livewire\Affichage;
use App\Http\Livewire\Armoire;
use App\Http\Livewire\Bande;
use App\Http\Livewire\Bassin;
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
use App\Http\Livewire\CheckDateNotification;
use App\Http\Livewire\DataChart;
use App\Http\Livewire\Depense;
use App\Http\Livewire\Password;
use App\Http\Livewire\Profile;
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

use App\Http\Controllers\HomeController;

//permission
use App\Http\Livewire\ManagerArticles;
use App\Http\Livewire\ManagerProducts;
use App\Models\Site;
use App\View\Components\NotificationBell;

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
Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'remove']);
Route::resource('intervenants', HomeController::class);
Route::get('/intervenants', [HomeController::class, 'index'])->name('intervenants.index');




Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){

    Route::group([
        "prefix" => "habilitations",
        'as' => 'habilitations.'
    ], function(){

        Route::get("/utilisateurs", Utilisateurs::class)->name("users.index")->middleware("auth.admin");
    });
});

//
    Route::group([
        "prefix" => "caracteristiques",
        'as' => 'caracteristiques.'
    ], function(){

        Route::get("/moteurs", Caracteristique::class)->name("caracteristique.caracteristique");
    });
//

//
    Route::group([
        "prefix" => "localisations",
        'as' => 'localisations.'
    ], function(){

        Route::get("/district", AddDistricts::class)->name("addDistricts.add-districts");
    });
//
//
    Route::group([
        "prefix" => "localisations",
        'as' => 'localisations.'
    ], function(){

        Route::get("/site", AddSite::class)->name("addSite.add-site");
    });
//
//
    Route::group([
        "prefix" => "localisations",
        'as' => 'localisations.'
    ], function(){

        Route::get("/forage", AddForage::class)->name("addForage.add-forage");
    });
//
//
    Route::group([
        "prefix" => "localisations",
        'as' => 'localisations.'
    ], function(){

        Route::get("/type", AddType::class)->name("addType.add-type");
    });
//

    Route::group([
        "prefix" => "tableau",
        'as' => 'tableau.'
    ], function(){

        Route::get("/bandes", Bande::class)->name("bande.bande");
    });
//
    Route::group([
        "prefix" => "tableau",
        'as' => 'tableau.'
    ], function(){

        Route::get("/depenses", Depense::class)->name("depense.depense");
    });
//
Route::get("/intervenants", Intervenant::class)->name("Intervenant.intervenant");
Route::get("/incidents", Incident::class)->name("Incident.incident"); 
Route::get("/uploads", Uploads::class)->name("uploads");
Route::get("/tes", Teste::class)->name("teste")->middleware("auth.admin");
Route::get("/maintenances", Maintenance::class)->name("maintenance.maintenance");
Route::get("/commandes", Commande::class)->name("commande.commande");
Route::get("/bis", BisList::class)->name("bis.bis");
Route::get("/mesures", Mesure::class)->name("mesure.mesure");
Route::get("/rapports", Rapport::class)->name("rapport.rapport");
Route::get("/armoires", Armoire::class)->name("armoire.armoire");
Route::get("/calcule", Calcules::class)->name("calcules");
//Route::get("/Affichage", Affichage::class)->name("affichage.affichage")->middleware("auth.admin");
Route::get("/profile", Profile::class)->name("profile");
Route::get("/password", Password::class)->name("password");

Route::get("/chart", DataChart::class)->name("chart");

Route::group([
    "prefix" => "caracteristiques",
    'as' => 'caracteristiques.'
], function(){

    Route::get("/forages", Ouvrage::class)->name("ouvrage.ouvrage");
});
//bassin
Route::group([
    "prefix" => "caracteristiques",
    'as' => 'caracteristiques.'
], function(){

    Route::get("/bassins", Bassin::class)->name("bassin.bassin");
});


//permissions
Route::get('/manage-products', ManagerProducts::class); //('can:delete, product');//middleware('can:update,App\Models\Product');
//lockscreen
Route::get('lockscreen', [ProfileController::class, 'lockscreen'])->name("lockscreen");
Route::post('/lockscreen', [ProfileController::class, 'lockScreenUpdate'])->name("lockscreen");




/*route teste*/
Route::get('/notificationes', [NotificationeController::class, 'index'])->name('notificationes.index');
Route::patch('/notificationes/{id}/read', [NotificationeController::class, 'markAsRead'])->name('notificationes.read');

/*fin route teste*/
Route::get('/notifications', CheckDateNotification::class)->name("notification");
//Route::get("/notify",[App\Http\Controllers\HomeController::class, 'notify']);
Route::get("/markasred/{id}",[App\Http\Controllers\HomeController::class, 'markasred'])->name('markasred');
//Route::get("/markasred",Utilisateurs::class)->name('markasred')->middleware("auth.admin");

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

