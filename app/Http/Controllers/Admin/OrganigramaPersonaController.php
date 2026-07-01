<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganigramaPersona;
use App\Models\OrganigramaDepartamento;
use Illuminate\Http\Request;

class OrganigramaPersonaController extends Controller
{
    public function index(Request $request)
    {
        $query = OrganigramaPersona::with('departamento');

        if ($request->filled('buscar')) {
            $query->where(function($q) use ($request) {
                $q->where('nombre', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('apellido', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('cargo', 'ilike', '%'.$request->buscar.'%');
            });
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

        $personas = $query->paginate(10)->appends($request->query());
        return view('admin.organigrama.personas.index', compact('personas'));
    }

    public function create()
    {
        $departamentos = OrganigramaDepartamento::where('activo', true)->orderBy('orden', 'asc')->get();
        return view('admin.organigrama.personas.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departamento_id' => 'required|exists:organigrama_departamentos,id',
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cargo' => 'required|max:255',
            'descripcion' => 'nullable|max:500',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'orden' => 'nullable|integer',
        ]);

        $p = new OrganigramaPersona();
        $p->departamento_id = $request->departamento_id;
        $p->nombre = $request->nombre;
        $p->apellido = $request->apellido;
        $p->cargo = $request->cargo;
        $p->descripcion = $request->descripcion;
        $p->orden = $request->orden ?? 0;
        $p->activo = $request->has('activo');
        if ($request->hasFile('imagen')) $p->imagen = $request->file('imagen')->store('organigrama', 'public');
        $p->save();

        return redirect()->route('admin.organigrama.personas.index')->with('success', 'Persona agregada.');
    }

    public function edit(OrganigramaPersona $persona)
    {
        $departamentos = OrganigramaDepartamento::where('activo', true)->orderBy('orden', 'asc')->get();
        return view('admin.organigrama.personas.edit', compact('persona', 'departamentos'));
    }

    public function update(Request $request, OrganigramaPersona $persona)
    {
        $request->validate([
            'departamento_id' => 'required|exists:organigrama_departamentos,id',
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cargo' => 'required|max:255',
            'descripcion' => 'nullable|max:500',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'orden' => 'nullable|integer',
        ]);

        $persona->departamento_id = $request->departamento_id;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->cargo = $request->cargo;
        $persona->descripcion = $request->descripcion;
        $persona->orden = $request->orden ?? 0;
        $persona->activo = $request->has('activo');
        if ($request->hasFile('imagen')) $persona->imagen = $request->file('imagen')->store('organigrama', 'public');
        $persona->save();

        return redirect()->route('admin.organigrama.personas.index')->with('success', 'Persona actualizada.');
    }

    public function destroy(OrganigramaPersona $persona) { $persona->delete(); return redirect()->route('admin.organigrama.personas.index')->with('success', 'Persona eliminada.'); }
}