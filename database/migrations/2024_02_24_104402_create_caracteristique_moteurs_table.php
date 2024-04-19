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
            $table->string('marque')->nullable();
            $table->string('type')->nullable();
            $table->string('numeroSerie')->nullable();
            $table->string('numeroFabrication')->nullable();
            $table->string('vitesse')->nullable();
            $table->string('encombrement')->nullable();
            $table->date('anneeFabrication')->nullable();
            $table->string('fournisseur')->nullable();
            $table->date('dateAcquisition')->nullable();
            $table->date('dateMiseEnService')->nullable();
            $table->string('roulement')->nullable();
            $table->string('misesEnServices')->nullable();
            $table->string('observations')->nullable();
            $table->string('moteurs')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string("district_id")->nullable();
            $table->string("site_id")->nullable();
            $table->string("ressource_id")->nullable();
            $table->string("forage_id")->nullable();
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
