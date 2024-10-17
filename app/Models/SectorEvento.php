<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorEvento extends Model
{
    use HasFactory;

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id');
    }

    public function puestosUbicacion()
    {
        return $this->hasMany(PuestoUbicacion::class, 'id_sector_evento');
    }
}
