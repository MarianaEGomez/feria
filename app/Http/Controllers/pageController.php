<?php
namespace App\Http\Controllers;

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
}
