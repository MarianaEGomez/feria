<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registros_pagos', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 10, 2);
            $table->date('fecha');
            $table->unsignedBigInteger('id_estado_pago');
            $table->unsignedBigInteger('id_medio_pago');
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('id_estado_pago')->references('id')->on('tipos_de_pagos_estados')->onDelete('cascade');
            $table->foreign('id_medio_pago')->references('id')->on('tipos_de_pagos')->onDelete('cascade');
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_pagos');
    }
};
