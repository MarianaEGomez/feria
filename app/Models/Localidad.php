<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $table = 'localidades';
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'id_localidad');
    }
}

