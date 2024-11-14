<?php

// database/migrations/xxxx_xx_xx_add_registro_pago_id_to_reservation_places_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegistroPagoIdToReservationPlacesTable extends Migration
{
    public function up()
    {
        Schema::table('reservation_places', function (Blueprint $table) {
            $table->foreignId('registro_pago_id')->nullable()->constrained('registros_pagos')->after('persona_id')->comment('ID de registro de pago');
        });
    }

    public function down()
    {
        Schema::table('reservation_places', function (Blueprint $table) {
            $table->dropForeign(['registro_pago_id']);
            $table->dropColumn('registro_pago_id');
        });
    }
}
