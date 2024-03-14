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
            $table->string('intervenant');
            $table->string('caracteristique');
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
