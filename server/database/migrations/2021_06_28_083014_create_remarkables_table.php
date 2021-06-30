<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemarkablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarkables', function (Blueprint $table) {
            $table->id();
            $table->longText('poster')->nullable();
            $table->longText('banner');
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('combo_id');
            $table->unsignedBigInteger('discount_id');
            $table->string('categories');
            $table->boolean('status');
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('combo_id')->references('id')->on('combos');
            $table->foreign('discount_id')->references('id')->on('discounts');
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
        Schema::dropIfExists('remarkables');
    }
}
