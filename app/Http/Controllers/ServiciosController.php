<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios', compact('servicios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        Servicio::create($validated);
        return redirect()->route('servicios.index')->with('success', 'Servicio agregado correctamente.');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return response()->json($servicio);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $servicio = Servicio::findOrFail($id);
        $servicio->update($validated);

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy($id)
    {
    $servicio = Servicio::findOrFail($id);
    $servicio->update(['activo' => false]);

    return redirect()->route('servicios.index')->with('success', 'Servicio eliminado lógicamente.');
    }

}