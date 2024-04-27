<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ouvrages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ouvrages', function(Blueprint $table){
            $table->id();
            $table->string('annee');
            $table->string('debitExploite');
            $table->string('profondeur');
            $table->string('type');
            $table->string('etatActuel');
            $table->string('observation');
            $table->string('photo')->nullable();
            $table->foreignId('ressource_id')->nullable();
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
