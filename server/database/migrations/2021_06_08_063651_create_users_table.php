<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('avatar')->nullable(true);
            $table->string('phone_number')->unique();
            $table->string('cinema_point')->nullable(true);
            $table->string('salary')->nullable();
            $table->unsignedBigInteger('role_id')->nullable(true);
            $table->unsignedBigInteger('cinema_id')->nullable(true);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('cinema_id')->references('id')->on('cinemas');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
