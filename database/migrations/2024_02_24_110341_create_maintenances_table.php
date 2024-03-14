<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->date('dateMaintenance');
            $table->string('actionEntreprise');
            $table->string('DureeIntervention');
            $table->string('DureeReel')->nullable();
            $table->string('intervenant_id');
            $table->string('caracteristique_moteurs_id');
            $table->string('Rapport')->nullable();
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
        Schema::table('maintenances', function(Blueprint $table){
            $table->dropForeign(["intervenant_id", "caracteristique_moteur_id"]);
        });
        Schema::dropIfExists('maintenances');
    }
}
