<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuestoUbicacion extends Model
{
    use HasFactory;

    public function sectorEvento()
    {
        return $this->belongsTo(SectorEvento::class, 'id_sector_evento');
    }
}

