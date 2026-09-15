<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    /** @use HasFactory<\Database\Factories\HabitacionFactory> */
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'capacidad', 'estado', 'imagen'];
}
