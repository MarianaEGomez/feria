<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement(); 
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cuil')->unique();
            $table->foreignId('persona_contacto_id')->constrained('personas_contactos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
