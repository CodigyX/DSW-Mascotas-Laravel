<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotasController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::all();
        return view('mascotas', compact('mascotas'));
    }

    public function store(Request $request)
    {
        Mascota::create($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Se agregó la mascota correctamente.');
    }

    public function update(Request $request, $id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->update($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Se actualizó la mascota correctamente.');
    }

    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->update(['activo' => false]);
    
        return redirect()->route('mascotas.index')->with('success', 'Se borró la mascota correctamente.');
    }
}