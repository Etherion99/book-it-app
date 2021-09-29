<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumenttypesTable extends Migration
{
   
    public function up()
    {
        Schema::create('documenttypes', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('documenttypes');
    }
}
