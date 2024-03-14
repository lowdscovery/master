<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Armoires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armoires', function(Blueprint $table){
            $table->id();
            $table->string('repere');
            $table->string('designation');
            $table->string('marque');
            $table->string('type');
            $table->string('reglage');
            $table->date('datePose');
            $table->string('photodevant')->nullable();
            $table->string('photoderriere')->nullable();  
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
