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
            $table->foreignId('caracteristique_moteur_id')->nullable();
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
