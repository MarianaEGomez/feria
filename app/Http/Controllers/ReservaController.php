<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Localidad;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        Log::info('se recibe', ['data' => $request->all()]);
    }
    public function getPlaces()
    {
        $localidades = Localidad::with('eventos.sectoresEvento.puestosUbicacion')->get();

        $puestos = [];

        foreach ($localidades as $localidad) {
            foreach ($localidad->eventos as $evento) {
                foreach ($evento->sectoresEvento as $sector) {
                    foreach ($sector->puestosUbicacion as $puesto) {

                        $puestos[] = (object)[
                            'id' => $puesto->id_puesto_ubicacion,
                            'nombre' => $localidad->descripcion . ' - ' . $evento->descripcion . ' - ' . $sector->descripcion . ' - Puesto ' . $puesto->nro_puesto,
                            'precio' => rand(5000 -7500) 
                        ];
                    }
                }
            }
        }

        return view('pages.reservas', compact('puestos'));
    }
}
