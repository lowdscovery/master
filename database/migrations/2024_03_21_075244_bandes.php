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
            $table->float('Nombre');
            $table->float('U1');
            $table->float('U2');
            $table->float('U3');
            $table->float('MoyenU')->nullable();
            $table->float('I1');
            $table->float('I2');
            $table->float('I3');
            $table->float('MoyenI')->nullable();
            $table->float('Puissance')->nullable();
            $table->float('Debit');
            $table->float('Pression');
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
