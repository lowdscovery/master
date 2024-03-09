<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiqueMoteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristique_moteurs', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('type');
            $table->string('numeroSerie');
            $table->string('numeroFabrication');
            $table->string('vitesse');
            $table->string('encombrement');
            $table->string('anneeFabrication');
            $table->string('fournisseur');
            $table->dateTime('dateAcquisition');
            $table->dateTime('dateMiseEnService');
            $table->string('roulement');
            $table->string('misesEnServices');
            $table->string('observations');
            $table->foreignId('user_id');
            $table->foreignId('moteur_pompe_id');
            $table->foreignId('moteur_electrique_id');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caracteristique_moteurs', function(Blueprint $table){
            $table->dropForeign(["user_id", "moteur_pompe_id", "moteur_electrique_id"]);
        });
        Schema::dropIfExists('caracteristique_moteurs');
    }
}
