<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('film_name');
            $table->string('global_name');
            $table->longText('poster');
            $table->string('producer');
            $table->string('categories');
            $table->string('director');
            $table->string('caster');
            $table->integer('duration');
            $table->date('release_date');
            $table->integer('status');
            $table->string('trailer');
            $table->string('description');
            $table->unsignedBigInteger('format_id');
            $table->foreign('format_id')->references('id')->on('format_films');
            $table->softDeletes();
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
        Schema::dropIfExists('films');
    }
}
