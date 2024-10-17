<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function enviarContacto(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);
    
        Mail::to('admin@example.com')->send(new ContactFormMail($validated));
 
        return redirect()->back()->with('success', '¡Tu mensaje ha sido enviado exitosamente!');
    }
    
}
