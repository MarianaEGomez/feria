<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubrosVentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros_ventas')->insert([
            ['description' => 'Comida y Bebidas'],
            ['description' => 'Artesanías'],
            ['description' => 'Ropa y Accesorios'],
            ['description' => 'Juguetes'],
            ['description' => 'Productos Naturales'],
            ['description' => 'Libros y Papelería'],
            ['description' => 'Electrónica'],
            ['description' => 'Muebles y Decoración'],
            ['description' => 'Flores y Plantas'],
            ['description' => 'Instrumentos Musicales'],
            ['description' => 'Joyería'],
            ['description' => 'Antigüedades'],
            ['description' => 'Artículos Deportivos'],
            ['description' => 'Juegos y Entretenimiento'],
            ['description' => 'Fotografía y Arte'],
        ]);
    }
}
