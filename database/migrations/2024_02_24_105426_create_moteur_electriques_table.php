<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoteurElectriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moteur_electriques', function (Blueprint $table) {
            $table->id();
            $table->string('puissance');
            $table->string('tension');
            $table->string('cosphi');
            $table->string('intensite');
            $table->string('sectionCable');
            $table->string('indiceDeProtection');
            $table->string('classeIsolant');
            $table->string('typeDeDemarrage');
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
        Schema::table('moteur_electriques', function(Blueprint $table){
            $table->dropForeign(["caracteristique_moteur_id"]);
        });
        Schema::dropIfExists('moteur_electriques');
    }
}
