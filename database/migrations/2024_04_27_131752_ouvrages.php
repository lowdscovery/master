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
            $table->string('type');
            $table->string('debitNominale');
            $table->string('profondeur');
            $table->string('debitConseiller');
            $table->string('debitExploite');
            $table->string('diametre');
            $table->string('nombreExhaur');
            $table->string('sondeBas');
            $table->string('sondeHaut');
            $table->string('photo');
            $table->string('filePdf');
            $table->foreignId('ressource_id');
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
       
    }
}
