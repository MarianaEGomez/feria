<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'rubro_id',
        'puesto_id',
        'approved',
        'persona_id',
        'registro_pago_id', 
    ];

    public function rubro()
    {
        return $this->belongsTo(RubroVenta::class);
    }

    public function puesto()
    {
        return $this->belongsTo(PuestoUbicacion::class, 'puesto_id', 'id');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class); 
    }
}
