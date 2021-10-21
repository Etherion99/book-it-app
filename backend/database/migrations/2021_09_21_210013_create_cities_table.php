<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('cit_code',30);
            $table->foreignId('department_id');
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
