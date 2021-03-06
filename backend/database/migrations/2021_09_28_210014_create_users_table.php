<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('lastname',30);
            $table->string('email', 30);
            $table->string('username', 30);
            $table->string('password',72);
            $table->foreignId('city_id');
            $table->string('document', 10);
            $table->foreignId('documenttype_id');
            $table->foreignId('gender_id');
            $table->foreignID('hotel_id')->nullable();
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('documenttype_id')->references('id')->on('documenttypes');
            $table->foreign('hotel_id')->references('id')->on('hotels');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
