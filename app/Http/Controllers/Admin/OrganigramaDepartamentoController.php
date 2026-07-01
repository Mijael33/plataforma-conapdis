<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganigramaDepartamento;
use Illuminate\Http\Request;

class OrganigramaDepartamentoController extends Controller
{
    public function index(Request $request)
    {
        $query = OrganigramaDepartamento::query();

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

        $departamentos = $query->paginate(10)->appends($request->query());
        return view('admin.organigrama.departamentos.index', compact('departamentos'));
    }

    public function create() { return view('admin.organigrama.departamentos.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|max:500',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'color' => 'nullable|max:7',
            'orden' => 'nullable|integer',
        ]);

        $dep = new OrganigramaDepartamento();
        $dep->nombre = $request->nombre;
        $dep->descripcion = $request->descripcion;
        $dep->color = $request->color ?? '#003097';
        $dep->orden = $request->orden ?? 0;
        $dep->activo = $request->has('activo');
        if ($request->hasFile('imagen')) $dep->imagen = $request->file('imagen')->store('organigrama', 'public');
        $dep->save();

        return redirect()->route('admin.organigrama.departamentos.index')->with('success', 'Departamento creado.');
    }

    public function edit(OrganigramaDepartamento $departamento) { return view('admin.organigrama.departamentos.edit', compact('departamento')); }

    public function update(Request $request, OrganigramaDepartamento $departamento)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|max:500',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'color' => 'nullable|max:7',
            'orden' => 'nullable|integer',
        ]);

        $departamento->nombre = $request->nombre;
        $departamento->descripcion = $request->descripcion;
        $departamento->color = $request->color ?? '#003097';
        $departamento->orden = $request->orden ?? 0;
        $departamento->activo = $request->has('activo');
        if ($request->hasFile('imagen')) $departamento->imagen = $request->file('imagen')->store('organigrama', 'public');
        $departamento->save();

        return redirect()->route('admin.organigrama.departamentos.index')->with('success', 'Departamento actualizado.');
    }

    public function destroy(OrganigramaDepartamento $departamento) { $departamento->delete(); return redirect()->route('admin.organigrama.departamentos.index')->with('success', 'Departamento eliminado.'); }
}