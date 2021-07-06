<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_lines', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('mission_id')->unsigned();
            $table->foreign('mission_id')->references('id')->on('missions');
            $table->string('title');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('unity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_lines');
    }
}
