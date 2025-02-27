<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bis', function(Blueprint $table){
            $table->id();
            $table->string('repere');
            $table->string('designation');
            $table->string('marque');
            $table->string('type');
            $table->string('Dn');
            $table->string('Pn');
            $table->date('dateDePose');
            $table->string('tarage');
            $table->string('typemoteur');
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
