<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type');
            $table->foreignId('site_id');
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
        Schema::table('ressources', function(Blueprint $table){
            $table->dropForeign(["site_id", "caracteristique_moteur_id"]);
        });
        Schema::dropIfExists('ressources');
    }
}
