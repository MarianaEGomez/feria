<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $primaryKey = 'eventos_id'; 

    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'id_localidad', 'id_localidad');
    }

    public function sectoresEvento()
    {
        return $this->hasMany(SectorEvento::class, 'eventos_id', 'eventos_id');
    }
}
