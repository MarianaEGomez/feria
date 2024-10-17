<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubroVenta extends Model
{
    use HasFactory;

    protected $table = 'rubros_ventas';

    protected $fillable = ['description'];
}
