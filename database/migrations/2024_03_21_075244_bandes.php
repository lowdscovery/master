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
            $table->date('Date')->nullable();
            $table->string('Moteur')->nullable();
            $table->string('Pompe')->nullable();
            $table->float('U1')->nullable();
            $table->float('U2')->nullable();
            $table->float('U3')->nullable();
            $table->float('MoyenU')->nullable();
            $table->float('I1')->nullable();
            $table->float('I2')->nullable();
            $table->float('I3')->nullable();
            $table->float('MoyenI')->nullable();
            $table->float('Puissance')->nullable();
            $table->float('Debit')->nullable();
            $table->float('Pression')->nullable();
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
