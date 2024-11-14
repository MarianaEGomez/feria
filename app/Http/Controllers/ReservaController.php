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
use App\Models\RegistroPago;
use App\Models\TipoDePago;
use App\Services\MercadoPagoService;
use Illuminate\Support\Facades\Mail;
class ReservaController extends Controller
{
    private MercadoPagoService $MercadoPagoService;

    public function __construct(MercadoPagoService $MercadoPagoService)
    {
        $this->MercadoPagoService = $MercadoPagoService;
    }

    public function store(Request $request)
    {
        Log::info('Se recibe la reserva', ['persona' => $request->all()]);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cuil' => 'required|string|max:11|unique:personas,cuil',
            'email' => 'required|email|unique:personas_contactos,email',
            'telefono' => 'required|string|max:15',
            'rubro' => 'required|integer',
            'puesto_ids' => 'required|array',
            'total_a_pagar' => 'required|numeric',  
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
    
        $registroPago = RegistroPago::create([
            'total' => $request->input('total_a_pagar'),
            'fecha' => now(),
            'id_estado_pago' => 1, 
        ]);

        foreach ($request->input('puesto_ids') as $puesto_id) {
            ReservationPlace::create([
                'rubro_id' => $request->input('rubro'),
                'puesto_id' => $puesto_id,
                'persona_id' => $persona->id, 
                'registro_pago_id' => $registroPago->id,
                'approved' => 0,
            ]);
        }

        $items = []; 
        foreach ($request->input('puesto_ids') as $puesto_id) {
            $items[] = [
                'title' => 'Puesto ' . $puesto_id,
                'quantity' => 1,
                'unit_price' => $request->input('total_a_pagar') / count($request->input('puesto_ids')),
            ];
        }

        $linkPago = $this->MercadoPagoService->crearPreferencia($request->input('total_a_pagar'), $items);

        Log::info('Se ha guardado la persona y el pago', ['persona' => $persona, 'registroPago' => $registroPago]);
    
        return redirect()->away($linkPago); 
    }
    
    public function getPlaces()
    {
        $localidades = Localidad::with('eventos.sectoresEvento.puestosUbicacion')->get(); 
        $puestos = [];
        $puestosDisponibles = 0;
        $sectores = [];

        foreach ($localidades as $localidad) {
            foreach ($localidad->eventos as $evento) {
                foreach ($evento->sectoresEvento as $sector) {
                    $sectores[] = (object)[
                        'id' => $sector->id_sector_evento,
                        'descripcion' => $sector->descripcion,
                        'polygon' => $sector->polygon 
                    ];
                    
                    foreach ($sector->puestosUbicacion as $puesto) {
                        if ($puesto->disponibilidad) {
                            $puestosDisponibles++;
                            
                            $puestos[] = (object)[
                                'id' => $puesto->id,
                                'costo' => $puesto->costo,
                                'disponibilidad' => $puesto->disponibilidad,
                                'nombre' => $localidad->descripcion . ' - ' . $evento->descripcion . ' - ' . $sector->descripcion . ' - Puesto ' . $puesto->nro_puesto,
                                'sector_id' => $sector->id_sector_evento 
                            ];
                        }
                    }
                }
            }
        }

        $rubros = RubroVenta::all();

        return view('pages.reservas', compact('puestos', 'rubros', 'puestosDisponibles', 'sectores'));
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
