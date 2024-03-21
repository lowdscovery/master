<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bandes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bandes', function(Blueprint $table){
            $table->id();
            $table->string('U1');
            $table->string('U2');
            $table->string('U3');
            $table->string('I1');
            $table->string('I2');
            $table->string('I3');
            $table->string('Puissance');
            $table->string('Debit');
            $table->string('Pression');
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
