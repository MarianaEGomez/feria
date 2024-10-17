<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Localidad;
use App\Models\Persona;
use App\Models\PersonaContacto;
use App\Models\ReservationPlace;
use App\Models\RubroVenta;
use Illuminate\Support\Facades\Log;
use App\Mail\ReservationStatusUpdated;
use Illuminate\Support\Facades\Mail;
class ReservaController extends Controller
{
    public function store(Request $request)
    {
        Log::info('se recibeee', ['persona' => $request->all()]);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cuil' => 'required|string|max:11|unique:personas,cuil',
            'email' => 'required|email|unique:personas_contactos,email',
            'telefono' => 'required|string|max:15',
            'rubro' => 'required|integer',
            'puesto_ids' => 'required|array',
        ]);
 
        $contacto = PersonaContacto::create([
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
        ]);
    
        $persona = Persona::create([
            'nombre' => $request->input('name'),
            'apellido' => $request->input('apellido'),
            'cuil' => $request->input('cuil'),
            'persona_contacto_id' => $contacto->id,
        ]);
    
        foreach ($request->input('puesto_ids') as $puesto_id) {
            ReservationPlace::create([
                'rubro_id' => $request->input('rubro'),
                'puesto_id' => $puesto_id,
                'persona_id' => $persona->id, 
                'approved' => 0,
            ]);
        }
    
        Log::info('Se ha guardado la persona', ['persona' => $persona]);
    
        return redirect()->route('reservas')->with('success', '¡Su reserva ha sido realizada con éxito! Por favor, aguarde la aprobación. Recibirá un correo electrónico confirmando la aprobación por parte del administrador una vez que se haya procesado.');
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
                            'id' => $puesto->id,
                            'nombre' => $localidad->descripcion . ' - ' . $evento->descripcion . ' - ' . $sector->descripcion . ' - Puesto ' . $puesto->nro_puesto,
                        ];
                    }
                }
            }
        }

        $rubros = RubroVenta::all();

        return view('pages.reservas', compact('puestos', 'rubros'));
    }

    public function approve($id)
    {
        $reservationPlace = ReservationPlace::findOrFail($id);
        $reservationPlace->approved = 1; 
        $reservationPlace->save();
 
        Mail::to($reservationPlace->persona->contacto->email)->send(new ReservationStatusUpdated($reservationPlace, 'aprobada'));
    
        return redirect()->back()->with('success', 'Reserva aprobada exitosamente.');
    }
    
    public function reject($id)
    {
        $reservationPlace = ReservationPlace::findOrFail($id);
        $reservationPlace->approved = 2; 
        $reservationPlace->save();

        Mail::to($reservationPlace->persona->contacto->email)->send(new ReservationStatusUpdated($reservationPlace, 'rechazada'));
    
        return redirect()->back()->with('success', 'Reserva rechazada exitosamente.');
    }

}
