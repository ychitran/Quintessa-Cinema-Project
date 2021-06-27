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
            $table->string('producer')->nullable();
            $table->string('categories')->nullable();
            $table->string('director')->nullable();
            $table->string('caster')->nullable();
            $table->integer('duration')->nullable(true);
            $table->date('release_date')->nullable(true);
            $table->integer('status');
            $table->string('trailer')->nullable(true);
            $table->string('description')->nullable(true);
            $table->unsignedBigInteger('format_id')->nullable(true);
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
