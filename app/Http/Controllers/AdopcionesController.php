<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopcion;
use App\Models\Mascota;

class AdopcionesController extends Controller
{
    // Muestra todas las adopciones
    public function index()
    {
        $adopciones = Adopcion::with('mascota')->get();
        $mascotas = Mascota::all();
        return view('adopciones', compact('adopciones', 'mascotas'));
    }

    // Muestra el formulario para crear una nueva adopción
    public function create()
    {
        $mascotas = Mascota::where('activo', true)->get(); // Obtener mascotas activas
        return view('adopciones.create', compact('mascotas'));
    }

    // Almacena una nueva adopción
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',  // Validar que la mascota exista
            'nombre_mascota' => 'required|string|max:255',
            'edad' => 'required|integer',
            'descripcion' => 'nullable|string',
            'imagen_url' => 'nullable|url',
            'estado_adopcion' => 'required|string',
        ]);

        // Crear una nueva adopción
        Adopcion::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('adopciones.index')->with('success', 'Adopción registrada correctamente.');
    }

    // Muestra el formulario para editar una adopción existente
    public function edit($id)
    {
        $adopcion = Adopcion::findOrFail($id);
        $mascotas = Mascota::where('activo', true)->get();  // Obtener mascotas activas
        return view('adopciones.edit', compact('adopcion', 'mascotas'));
    }

    // Actualiza una adopción existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',  // Validar que la mascota exista
            'nombre_mascota' => 'required|string|max:255',
            'edad' => 'required|integer',
            'descripcion' => 'nullable|string',
            'imagen_url' => 'nullable|url',
            'estado_adopcion' => 'required|string',
        ]);

        // Buscar la adopción y actualizarla
        $adopcion = Adopcion::findOrFail($id);
        $adopcion->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('adopciones.index')->with('success', 'Adopción actualizada correctamente.');
    }

    // Eliminar una adopción (solo la marca como inactiva)
    public function destroy($id)
    {
        $adopcion = Adopcion::findOrFail($id);
        $adopcion->update(['activo' => false]);

        return redirect()->route('adopciones.index')->with('success', 'Adopción eliminada correctamente.');
    }
}
