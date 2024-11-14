<?php

// app/Models/RegistroPago.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroPago extends Model
{
    use HasFactory;
    protected $table = 'registros_pagos';
    protected $fillable = [
        'total',
        'fecha',
        'id_estado_pago',
    ];

    public function estadoPago()
    {
        return $this->belongsTo(TipoDePagoEstado::class, 'id_estado_pago');
    }    
}
