<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservation_places', function (Blueprint $table) {
            $table->id(); // ID de la reserva
            $table->unsignedBigInteger('rubro_id'); // ID del rubro, asegurado como unsigned
            $table->unsignedBigInteger('puesto_id'); // ID del puesto, asegurado como unsigned
            $table->boolean('approved')->default(0); // Estado de aprobación, por defecto 0
            $table->timestamps(); // Tiempos de creación y actualización

            // Claves foráneas
            $table->foreign('rubro_id')->references('id')->on('rubros_ventas')->onDelete('cascade');
            $table->foreign('puesto_id')->references('id')->on('puesto_ubicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_places');
    }
};
