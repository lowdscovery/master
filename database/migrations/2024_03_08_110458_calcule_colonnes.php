<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CalculeColonnes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calcule_colonnes', function (Blueprint $table) {
            $table->id();
            $table->float('col1');
            $table->float('col2');
            $table->float('col3');
            $table->float('avg_col')->nullable();
            $table->float('result_col')->nullable();
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
