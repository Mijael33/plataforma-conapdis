<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnlaceMenu;
use Illuminate\Http\Request;

class EnlaceMenuController extends Controller
{
    public function index(Request $request)
    {
        $query = EnlaceMenu::query();

        if ($request->filled('buscar')) {
            $query->where(function($q) use ($request) {
                $q->where('titulo', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('vinculo', 'ilike', '%'.$request->buscar.'%');
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

        $enlaces = $query->paginate(10)->appends($request->query());
        return view('admin.enlaces.index', compact('enlaces'));
    }

    public function create() { return view('admin.enlaces.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'vinculo' => 'required|url|max:500',
            'orden' => 'nullable|integer',
        ]);
        $validated['activo'] = $request->has('activo');
        EnlaceMenu::create($validated);
        return redirect()->route('admin.enlaces.index')->with('success', 'Enlace creado exitosamente.');
    }

    public function edit(EnlaceMenu $enlace) { return view('admin.enlaces.edit', compact('enlace')); }

    public function update(Request $request, EnlaceMenu $enlace)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'vinculo' => 'required|url|max:500',
            'orden' => 'nullable|integer',
        ]);
        $validated['activo'] = $request->has('activo');
        $enlace->update($validated);
        return redirect()->route('admin.enlaces.index')->with('success', 'Enlace actualizado exitosamente.');
    }

    public function destroy(EnlaceMenu $enlace) { $enlace->delete(); return redirect()->route('admin.enlaces.index')->with('success', 'Enlace eliminado exitosamente.'); }
}