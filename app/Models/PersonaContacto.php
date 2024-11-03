<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaContacto extends Model
{
    use HasFactory;

    protected $table = 'personas_contactos';
    protected $fillable = [
        'email',
        'telefono',
    ];
    public $timestamps = false;

    public function personas()
    {
        return $this->hasMany(Persona::class, 'persona_contacto_id');
    }
}
