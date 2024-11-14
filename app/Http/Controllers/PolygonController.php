<?php

// app/Http/Controllers/PolygonController.php

namespace App\Http\Controllers;

use App\Models\Polygon;
use Illuminate\Http\Request;

class PolygonController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'polygons' => 'required|array',
            'polygons.*' => 'array',  // Cada polígono también es un array de coordenadas
        ]);
    
        foreach ($data['polygons'] as $polygonCoordinates) {
            Polygon::create([
                'coordinates' => json_encode($polygonCoordinates),
            ]);
        }
    
        return response()->json(['message' => 'Polígonos guardados exitosamente'], 201);
    }
    public function index()
    {
        $polygons = Polygon::all();

        // Decodifica las coordenadas de cada polígono antes de enviarlas
        $polygons = $polygons->map(function ($polygon) {
            return [
                'id' => $polygon->id,
                'coordinates' => json_decode($polygon->coordinates),
            ];
        });

        return response()->json($polygons);
    }

}
