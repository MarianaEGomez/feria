<?php

// app/Models/TipoDePagoEstado.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDePagoEstado extends Model
{
    use HasFactory;

    protected $table = 'tipos_de_pagos_estados';

    protected $fillable = ['description'];
}
