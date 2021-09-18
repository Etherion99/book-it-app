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
            $table->date('date_birth');
            $table->integer('age');
            $table->string('last_name',30);
            $table->string('email',30);
            $table->string('username',10);
            $table->string('password',12);
            $table->integer('document');
            $table->foreignId('city_id');
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
