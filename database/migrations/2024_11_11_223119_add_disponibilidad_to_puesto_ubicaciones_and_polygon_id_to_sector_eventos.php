<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisponibilidadToPuestoUbicacionesAndPolygonIdToSectorEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('puesto_ubicaciones', function (Blueprint $table) {
            $table->boolean('disponibilidad')->default(true)->after('costo');
        });

        Schema::table('sector_eventos', function (Blueprint $table) {
            $table->unsignedBigInteger('polygon_id')->nullable()->after('eventos_id');
            $table->foreign('polygon_id')->references('id')->on('polygons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puesto_ubicaciones', function (Blueprint $table) {
            $table->dropColumn('disponibilidad');
        });

        Schema::table('sector_eventos', function (Blueprint $table) {
            $table->dropForeign(['polygon_id']);
            $table->dropColumn('polygon_id');
        });
    }
}
