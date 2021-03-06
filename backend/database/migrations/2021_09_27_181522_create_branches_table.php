<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id');
            $table->foreignId('city_id');
            $table->foreignId('branchtype_id');
            $table->string('name',20);
            $table->string('address',20);
            $table->integer('phone');
            $table->string('description',50);
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('branchtype_id')->references('id')->on('branchtypes');            
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
