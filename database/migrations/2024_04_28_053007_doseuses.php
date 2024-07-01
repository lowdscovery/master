<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Doseuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doseuses', function(Blueprint $table){
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
            $table->string('pressionMaxAspiration');
            $table->string('pressionMaxRefoulement');
            $table->string('hauteurAspirationMax');
            $table->string('cadence');
            $table->string('rapportReduction');
            $table->string('course');
            $table->string('ballonAmortisseur');
            $table->string('ballonAmortisseurRefoulement');
            $table->string('corpsDoseur');
            $table->string('membrane');
            $table->string('arbre');
            $table->string('calpetAspiration');
            $table->string('calpetRefoulement');
            $table->string('tarage');
            $table->string('debitMax');
            $table->foreignId('caracteristique_moteur_id');

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
        //
    }
}
