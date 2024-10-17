<?php
namespace App\Http\Controllers;

use App\Models\ReservationPlace;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function reservas() {
        return view('pages.reservas'); 
    }
    public function nosotros() {
        return view('pages.nosotros'); 
    }
    public function faq() 
    { 
        return view('pages.faq'); 
    }
    public function contactos() 
    {
        return view('pages.contactos'); 
    }
    public function reception() 
    {
        $reservationPlaces = ReservationPlace::with([
            'persona.contacto',
            'rubro', 
            'puesto.sectorEvento.evento.localidad'
        ])->get();        

        return view('pages.admin.reception', compact('reservationPlaces')); 
    }
}
