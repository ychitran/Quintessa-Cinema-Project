<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_revenues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id')->nullable();
            $table->unsignedBigInteger('revenue_id')->nullable();
            // $table->unsignedBigInteger('cinema_id');
            $table->string('revenue');
            // $table->foreign('cinema_id')->references('id')->on('cinemas');
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('revenue_id')->references('id')->on('revenues');
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
        Schema::dropIfExists('film_revenues');
    }
}
