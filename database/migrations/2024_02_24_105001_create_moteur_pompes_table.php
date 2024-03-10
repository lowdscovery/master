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
            $table->string('debitNominal');
            $table->string('hauteurManometrique');
            $table->string('corpsDePompe');
            $table->string('chemiseArbre');
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
        Schema::table('moteur_pompes', function(Blueprint $table){
            $table->dropForeign(["caracteristique_moteur_id"]);
        });
        Schema::dropIfExists('moteur_pompes');
    }
}
