<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bassins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bassins', function(Blueprint $table){
            $table->id();
            $table->float('Longueur');
            $table->float('Largeur');
            $table->float('Hauteur');
            $table->float('Volume');
            $table->float('HauteurAspiration');
            $table->float('VolumeAspiration');
            $table->float('Total')->nullable();
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
