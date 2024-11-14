<?php

// database/seeders/TipoDePagoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDePago;
use App\Models\TipoDePagoEstado;

class TipoDePagoSeeder extends Seeder
{
    public function run()
    {
        $tiposDePagos = [
            ['descripcion' => 'Transferencia'],
            ['descripcion' => 'Efectivo'],
        ];

        foreach ($tiposDePagos as $tipo) {
            TipoDePago::create($tipo);
        }

        $estadosDePagos = [
            ['description' => 'Pendiente'],
            ['description' => 'En proceso'],
            ['description' => 'Completado'],
        ];

        foreach ($estadosDePagos as $estado) {
            TipoDePagoEstado::create($estado);
        }
    }
}
