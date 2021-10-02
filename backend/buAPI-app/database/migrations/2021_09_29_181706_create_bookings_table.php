<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('hour');
            $table->integer('time');
            $table->integer('total_cost');
            $table->timestamps();
            $table->foreignId('user_id');
            $table->foreignId('room_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
