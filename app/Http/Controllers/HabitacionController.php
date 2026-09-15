<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitacions = Habitacion::all();
        return view('habitacions.index', compact('habitacions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('habitacions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'capacidad' => 'required|integer|min:1',
        'estado' => 'required|in:disponible,ocupada,reservada,mantenimiento',
        'imagen' => 'nullable|string|max:255',
    ]);

    Habitacion::create($datos);

    return redirect()
        ->route('habitacions.index')
        ->with('success', 'Habitación registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Habitacion $habitacion)
    {
        return view('habitacions.show', compact('habitacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habitacion $habitacion)
    {
        return view('habitacions.edit', compact('habitacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        $datos = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'capacidad' => 'required|integer|min:1',
        'estado' => 'required|in:disponible,ocupada,reservada,mantenimiento',
        'imagen' => 'nullable|string|max:255',
    ]);

    $habitacion->update($datos);

    return redirect()
        ->route('habitacions.index')
        ->with('success', 'Habitación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitacion $habitacion)
    {
         $habitacion->delete();
        //eliminar imagen si existe
        if (file_exists(public_path('images/habitacions/habitacion_'.$habitacion->id.'.jpg'))) {
            unlink(public_path('images/habitacions/habitacion_'.$habitacion->id.'.jpg'));
        }
        return redirect()->route('habitacions.index')->with('info', 'Habitacion eliminada con exito');
    }
}
