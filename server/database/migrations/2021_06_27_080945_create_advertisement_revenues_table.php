<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_revenues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id')->nullable();
            $table->unsignedBigInteger('revenue_id')->nullable();
            $table->string('revenue');
            $table->foreign('ad_id')->references('id')->on('ads');
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
        Schema::dropIfExists('advertisement_revenues');
    }
}
