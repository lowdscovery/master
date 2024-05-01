<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mesures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesures', function(Blueprint $table){
            $table->id();
            $table->Date('Date');
            $table->string('IndexCH');
            $table->string('H');
            $table->string('U1');
            $table->string('U2');
            $table->string('U3');
            $table->string('I1');
            $table->string('I2');
            $table->string('I3');
            $table->string('Puissance');
            $table->string('Cos');
            $table->string('Ph1/PH2');
            $table->string('Ph1/PH3');
            $table->string('Ph2/PH3');
            $table->string('Ph1/m');
            $table->string('Ph2/m');
            $table->string('Ph3/m');
            $table->string('X1/X2');
            $table->string('Y1/Y2');
            $table->string('Z1/Z2');
            $table->string('Debit');
            $table->string('Vacuo');
            $table->string('Mano');
            $table->string('ND');
            $table->string('NS');
            $table->string('Rab');
            $table->string('Cs');
            $table->string('Conspé');
            $table->string('Agent');
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
