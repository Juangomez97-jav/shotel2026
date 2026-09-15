<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_entrada',
        'fecha_salida',
        'precio_noche',
        'total',
        'habitacion_id',
    ];

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }
}
