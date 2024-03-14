<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commandes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->date('dateCommande');
            $table->string('motif');
            $table->string('article');
            $table->string('reference');
            $table->string('quantiteCommande');
            $table->string('numeroDA');
            $table->string('Situation');
            $table->string('quantiteReception');
            $table->date('dateReception');
            $table->string('observation');
            $table->string('caracteristique');
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
