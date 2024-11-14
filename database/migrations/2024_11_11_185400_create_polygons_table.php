<?php

// database/migrations/xxxx_xx_xx_create_polygons_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolygonsTable extends Migration
{
    public function up()
    {
        Schema::create('polygons', function (Blueprint $table) {
            $table->id();
            $table->json('coordinates');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('polygons');
    }
}
