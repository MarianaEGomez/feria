<?php

// app/Models/SectorEvento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorEvento extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sector_evento';

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'eventos_id', 'eventos_id');
    }

    public function puestosUbicacion()
    {
        return $this->hasMany(PuestoUbicacion::class, 'id_sector_evento', 'id_sector_evento');
    }

    public function polygon()
    {
        return $this->belongsTo(Polygon::class, 'polygon_id');
    }
}
