<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('format_id');
            $table->integer('normal_price');
            $table->integer('member_price');
            $table->integer('weekend_price');
            $table->integer('holiday_price');
            $table->foreign('format_id')->references('id')->on('format_films');
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
        Schema::dropIfExists('ticket_prices');
    }
}
