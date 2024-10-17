<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'cuil',
        'persona_contacto_id',
    ];
    public $timestamps = false;

    public function contacto()
    {
        return $this->belongsTo(PersonaContacto::class, 'persona_contacto_id');
    }
}
