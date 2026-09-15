<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = ['subtotal_habitacion', 'subtotal_productos', 'total', 'metodo_pago', 'estado', 'cliente_id', 'registro_id'];
}
