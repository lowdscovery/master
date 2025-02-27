<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYourModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('your_models', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->date('date'); // Stocke la date de la notification
            $table->boolean('read')->default(false); // Stocke si la notification est lue
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
        Schema::dropIfExists('your_models');
    }
}
