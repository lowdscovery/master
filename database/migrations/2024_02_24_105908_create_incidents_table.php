<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->date('dateIncident');
            $table->string('indexCH');
            $table->string('heure');
            $table->string('natureIncident');
            $table->string('cause');
            $table->string('action');
            $table->string('resultat');       
            $table->foreignId('intervenant_id');
            $table->foreignId('caracteristique_moteur_id');
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
        Schema::table('incidents', function(Blueprint $table){
            $table->dropForeign(["intervenant_id", "caracteristique_moteur_id"]);
        });
        Schema::dropIfExists('incidents');
    }
}
