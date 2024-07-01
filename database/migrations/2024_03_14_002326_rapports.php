<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rapports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapports', function(Blueprint $table){
            $table->id();
            $table->date('dateDebut');
            $table->date('dateFin')->nullable();
            $table->string('intervenant_id');
            $table->string('lieu');
            $table->string('motif');
            $table->string('rapport')->nullable();  
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
