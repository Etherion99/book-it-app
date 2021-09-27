<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
   
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->string('web_page',30);
            $table->string('nit',12);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
