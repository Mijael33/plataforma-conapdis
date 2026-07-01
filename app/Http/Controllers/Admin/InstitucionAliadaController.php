<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstitucionAliada;
use Illuminate\Http\Request;

class InstitucionAliadaController extends Controller
{
    public function index(Request $request)
    {
        $query = InstitucionAliada::query();

        if ($request->filled('buscar')) {
            $query->where('nombre', 'ilike', '%'.$request->buscar.'%');
        }

        if ($request->filled('estado')) {
            $query->where('activo', $request->estado == 'activo');
        }

        switch ($request->orden) {
            case 'antiguo': $query->orderBy('created_at', 'asc'); break;
            case 'az': $query->orderBy('nombre', 'asc'); break;
            case 'za': $query->orderBy('nombre', 'desc'); break;
            default: $query->orderBy('orden', 'asc');
        }

        $instituciones = $query->paginate(10)->appends($request->query());
        return view('admin.instituciones.index', compact('instituciones'));
    }

    public function create() { return view('admin.instituciones.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'vinculo' => 'nullable|url|max:500',
            'orden' => 'nullable|integer',
        ]);
        $validated['activo'] = $request->has('activo');
        if ($request->hasFile('imagen')) $validated['imagen'] = $request->file('imagen')->store('instituciones', 'public');
        InstitucionAliada::create($validated);
        return redirect()->route('admin.instituciones.index')->with('success', 'Institución aliada creada exitosamente.');
    }

    public function edit(InstitucionAliada $institucione) { return view('admin.instituciones.edit', compact('institucione')); }

    public function update(Request $request, InstitucionAliada $institucione)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'vinculo' => 'nullable|url|max:500',
            'orden' => 'nullable|integer',
        ]);
        $validated['activo'] = $request->has('activo');
        if ($request->hasFile('imagen')) $validated['imagen'] = $request->file('imagen')->store('instituciones', 'public');
        $institucione->update($validated);
        return redirect()->route('admin.instituciones.index')->with('success', 'Institución aliada actualizada exitosamente.');
    }

    public function destroy(InstitucionAliada $institucione) { $institucione->delete(); return redirect()->route('admin.instituciones.index')->with('success', 'Institución aliada eliminada exitosamente.'); }
}