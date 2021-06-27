<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_revenues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('combo_id')->nullable();
            $table->unsignedBigInteger('revenue_id')->nullable();
            $table->string('revenue');
            $table->foreign('combo_id')->references('id')->on('combos');
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
        Schema::dropIfExists('product_revenues');
    }
}
