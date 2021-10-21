<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->integer('dep_code');
            $table->foreignId('country_id');
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
