<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LineaTiempo;
use Illuminate\Http\Request;

class LineaTiempoController extends Controller
{
    public function index(Request $request)
    {
        $query = LineaTiempo::query();

        if ($request->filled('buscar')) {
            $query->where(function($q) use ($request) {
                $q->where('titulo', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('descripcion', 'ilike', '%'.$request->buscar.'%');
            });
        }

        if ($request->filled('estado')) {
            $query->where('activo', $request->estado == 'activo');
        }

        switch ($request->orden) {
            case 'antiguo': $query->orderBy('anio', 'asc'); break;
            case 'az': $query->orderBy('titulo', 'asc'); break;
            case 'za': $query->orderBy('titulo', 'desc'); break;
            default: $query->orderBy('anio', 'asc');
        }

        $eventos = $query->paginate(20)->appends($request->query());
        return view('admin.linea-tiempo.index', compact('eventos'));
    }

    public function create() { return view('admin.linea-tiempo.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'anio' => 'required|integer|min:1900|max:2100',
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'orden' => 'nullable|integer',
        ]);
        $validated['activo'] = $request->has('activo');
        LineaTiempo::create($validated);
        return redirect()->route('admin.linea-tiempo.index')->with('success', 'Evento creado exitosamente.');
    }

    public function edit(LineaTiempo $lineaTiempo) { return view('admin.linea-tiempo.edit', compact('lineaTiempo')); }

    public function update(Request $request, LineaTiempo $lineaTiempo)
    {
        $validated = $request->validate([
            'anio' => 'required|integer|min:1900|max:2100',
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'orden' => 'nullable|integer',
        ]);
        $validated['activo'] = $request->has('activo');
        $lineaTiempo->update($validated);
        return redirect()->route('admin.linea-tiempo.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy(LineaTiempo $lineaTiempo) { $lineaTiempo->delete(); return redirect()->route('admin.linea-tiempo.index')->with('success', 'Evento eliminado exitosamente.'); }
}