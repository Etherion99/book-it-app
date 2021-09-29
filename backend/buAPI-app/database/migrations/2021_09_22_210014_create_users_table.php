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
            $table->date('email');
            $table->integer('username');
            $table->string('password',30);   
            $table->foreignId('city_id');
            $table->integer('document');
            $table->foreignId('documenttype_id');
            $table->foreignId('gender_id');
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('documenttype_id')->references('id')->on('documenttypes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
