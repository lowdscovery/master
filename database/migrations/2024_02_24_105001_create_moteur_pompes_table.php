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
        Schema::dropIfExists('moteur_pompes');
    }
}
