<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PuestoUbicacion;
use Carbon\Carbon;

class PuestoUbicacionSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        // Generar puestos para el id_sector_evento 1 (1 a 200, costo 1000)
        for ($i = 1; $i <= 200; $i++) {
            $data[] = [
                'nro_puesto' => $i,
                'id_sector_evento' => 1,
                'costo' => 1000,
                'disponibilidad' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Generar puestos para el id_sector_evento 2 (1 a 300, costo 2000)
        for ($i = 1; $i <= 300; $i++) {
            $data[] = [
                'nro_puesto' => $i,
                'id_sector_evento' => 2,
                'costo' => 2000,
                'disponibilidad' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Generar puestos para el id_sector_evento 3 (1 a 300, costo 3000)
        for ($i = 1; $i <= 300; $i++) {
            $data[] = [
                'nro_puesto' => $i,
                'id_sector_evento' => 3,
                'costo' => 3000,
                'disponibilidad' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insertar los datos en la tabla
        PuestoUbicacion::insert($data);
    }
}
