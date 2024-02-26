<?php

use App\Http\Controllers\UserController;
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
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");
        

    });
});




