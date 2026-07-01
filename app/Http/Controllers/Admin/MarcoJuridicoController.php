<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarcoJuridico;
use Illuminate\Http\Request;

class MarcoJuridicoController extends Controller
{
    public function index(Request $request)
    {
        $query = MarcoJuridico::query();

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
            case 'antiguo': $query->orderBy('created_at', 'asc'); break;
            case 'az': $query->orderBy('titulo', 'asc'); break;
            case 'za': $query->orderBy('titulo', 'desc'); break;
            default: $query->orderBy('orden', 'asc');
        }

        $leyes = $query->paginate(10)->appends($request->query());
        return view('admin.marco-juridico.index', compact('leyes'));
    }

    public function create()
    {
        return view('admin.marco-juridico.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'documento' => 'nullable|mimes:pdf|max:10240',
            'orden' => 'nullable|integer',
        ]);

        $validated['activo'] = $request->has('activo');

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('marco-juridico', 'public');
        }

        if ($request->hasFile('documento')) {
            $validated['documento'] = $request->file('documento')->store('marco-juridico', 'public');
        }

        MarcoJuridico::create($validated);

        return redirect()->route('admin.marco-juridico.index')
            ->with('success', 'Documento creado exitosamente.');
    }

    public function edit(MarcoJuridico $marcoJuridico)
    {
        return view('admin.marco-juridico.edit', compact('marcoJuridico'));
    }

    public function update(Request $request, MarcoJuridico $marcoJuridico)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'documento' => 'nullable|mimes:pdf|max:10240',
            'orden' => 'nullable|integer',
        ]);

        $validated['activo'] = $request->has('activo');

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('marco-juridico', 'public');
        }

        if ($request->hasFile('documento')) {
            $validated['documento'] = $request->file('documento')->store('marco-juridico', 'public');
        }

        $marcoJuridico->update($validated);

        return redirect()->route('admin.marco-juridico.index')
            ->with('success', 'Documento actualizado exitosamente.');
    }

    public function destroy(MarcoJuridico $marcoJuridico)
    {
        $marcoJuridico->delete();
        return redirect()->route('admin.marco-juridico.index')
            ->with('success', 'Documento eliminado exitosamente.');
    }
}