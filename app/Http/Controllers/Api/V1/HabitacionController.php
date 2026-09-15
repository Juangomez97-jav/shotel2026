<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Habitacion::all(), 200); //muestra todas las habitaciones de estado 200 (OK)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validación de los datos recibidos
        $datos=$request->validate([
            'nombre' => ['required','string', 'max:50'],
            'descripcion' => ['nullable','string', 'max:100'],
            'precio' => ['required','numeric','min:1000'],
            'capacidad' => ['required','integer','min:1'],
            'imagen' => ['nullable','string','max:255'],
        ]);
        //creación de la nueva habitación
        $habitacion = Habitacion::create($datos);

        //devolución de la respuesta
        return response()->json([
            'success' => true,
            'message' => 'Habitación creada exitosamente',
        ], 201); //creado correctamente
    }

    /**
     * Display the specified resource.
     */
    public function show(Habitacion $habitacion)
    {
        return response()->json($habitacion, 200); //muestra la hibitacion solicitada
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habitacion $habitacion)
    {
        //validación de los datos recibidos
        $datos=$request->validate([
            'nombre' => ['required','string', 'max:50'],
            'descripcion' => ['nullable','string', 'max:100'],
            'precio' => ['required','numeric','min:1000'],
            'capacidad' => ['required','integer','min:1'],
            'imagen' => ['nullable','string','max:255'],
        ]);
        //actualización de la habitación
        $habitacion->update($datos);

        //devolución de la respuesta
        return response()->json([
            'success' => true,
            'message' => 'Habitación actualizada exitosamente',
        ], 200); //actualizado correctamente
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habitacion $habitacion)
    {
        //eliminar la habitacion
        $habitacion->delete();

        //respuesta al usuario
        return response()->json([
            'success' => true,
            'message' => 'Habitacion eliminada correctamente',
        ], 204);//eliminado correctamente
    }
}
