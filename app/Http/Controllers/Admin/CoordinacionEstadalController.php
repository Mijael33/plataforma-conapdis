<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoordinacionEstadal;
use Illuminate\Http\Request;

class CoordinacionEstadalController extends Controller
{
    public function index(Request $request)
    {
        $query = CoordinacionEstadal::query();

        if ($request->filled('buscar')) {
            $query->where(function($q) use ($request) {
                $q->where('estado', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('direccion', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('coordinador', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('telefono', 'ilike', '%'.$request->buscar.'%');
            });
        }

        if ($request->filled('estado')) {
            $query->where('activo', $request->estado == 'activo');
        }

        switch ($request->orden) {
            case 'antiguo': $query->orderBy('created_at', 'asc'); break;
            case 'az': $query->orderBy('estado', 'asc'); break;
            case 'za': $query->orderBy('estado', 'desc'); break;
            default: $query->orderBy('orden', 'asc');
        }

        $coordinaciones = $query->paginate(30)->appends($request->query());
        return view('admin.coordinaciones.index', compact('coordinaciones'));
    }

    public function create() { return view('admin.coordinaciones.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'estado' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'nullable|max:50',
            'coordinador' => 'required|max:255',
            'enlace_mapa' => 'nullable|url|max:500',
            'orden' => 'nullable|integer',
        ]);
        $validated['activo'] = $request->has('activo');
        CoordinacionEstadal::create($validated);
        return redirect()->route('admin.coordinaciones.index')->with('success', 'Coordinación creada exitosamente.');
    }

    public function edit(CoordinacionEstadal $coordinacione) { return view('admin.coordinaciones.edit', compact('coordinacione')); }

    public function update(Request $request, CoordinacionEstadal $coordinacione)
    {
        $validated = $request->validate([
            'estado' => 'required|max:255',
            'direccion' => 'required',
            'telefono' => 'nullable|max:50',
            'coordinador' => 'required|max:255',
            'enlace_mapa' => 'nullable|url|max:500',
            'orden' => 'nullable|integer',
        ]);
        $validated['activo'] = $request->has('activo');
        $coordinacione->update($validated);
        return redirect()->route('admin.coordinaciones.index')->with('success', 'Coordinación actualizada exitosamente.');
    }

    public function destroy(CoordinacionEstadal $coordinacione) { $coordinacione->delete(); return redirect()->route('admin.coordinaciones.index')->with('success', 'Coordinación eliminada exitosamente.'); }
}