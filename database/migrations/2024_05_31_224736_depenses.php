<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Depenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function(Blueprint $table){
            $table->id();
            $table->date('Date');
            $table->string('Motif');
            $table->string('Designation');
            $table->string('Unite');
            $table->string('PrixUnitaire');
            $table->string('Quantite');
            $table->string('Total')->nullable();
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
