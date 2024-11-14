<?php

// database/migrations/xxxx_xx_xx_add_costo_to_puesto_ubicaciones_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostoToPuestoUbicacionesTable extends Migration
{
    public function up()
    {
        Schema::table('puesto_ubicaciones', function (Blueprint $table) {
            $table->decimal('costo', 10, 2)->after('id_sector_evento')->nullable()->comment('Costo del puesto');
        });
    }

    public function down()
    {
        Schema::table('puesto_ubicaciones', function (Blueprint $table) {
            $table->dropColumn('costo');
        });
    }
}

