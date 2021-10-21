<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_number');
            $table->foreignId('roomtype_id');
            $table->foreignId('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('roomtype_id')->references('id')->on('roomtypes');            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
