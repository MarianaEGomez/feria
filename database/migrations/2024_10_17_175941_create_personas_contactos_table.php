<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasContactosTable extends Migration
{
    public function up()
    {
        Schema::create('personas_contactos', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement(); 
            $table->string('email')->unique();
            $table->string('telefono');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas_contactos');
    }
}
