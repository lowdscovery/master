<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoteurPompesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moteur_pompes', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('type');
            $table->string('numeroSerie');
            $table->string('numeroFabrication');
            $table->string('vitesse');
            $table->date('anneeFabrication');
            $table->string('fournisseur');
            $table->date('dateAcquisition');
            $table->date('dateMiseEnService');
            $table->string('roulement');
            $table->string('misesEnServices');
            $table->string('observations');
            $table->string('debitNominal');
            $table->string('hauteurManometrique');
            $table->string('corpsDePompe');
            $table->string('chemiseArbre');
            $table->foreignId('caracteristique_moteur_id')->nullable();
            $table->foreignId('ouvrage_id')->nullable();
            $table->string('longueur');
            $table->string('largeur');
            $table->string('masse');
            $table->string('hauteur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moteur_pompes', function(Blueprint $table){
            $table->dropForeign(["caracteristique_moteur_id"]);
        });
        Schema::dropIfExists('moteur_pompes');
    }
}
