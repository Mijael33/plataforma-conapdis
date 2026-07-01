<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonioController extends Controller
{
    private function repararSecuencia()
    {
        try {
            DB::statement("SELECT setval('testimonios_id_seq', GREATEST((SELECT max(id) FROM testimonios), 1), true)");
        } catch (\Exception $e) {}
    }

    public function index(Request $request)
    {
        $query = Testimonio::query();
        $tieneFiltro = false;

        if ($request->filled('buscar')) {
            $tieneFiltro = true;
            $buscar = $request->buscar;
            $palabras = explode(' ', trim($buscar));
            $query->where(function($q) use ($palabras) {
                foreach ($palabras as $palabra) {
                    if (strlen($palabra) > 0) {
                        $q->where(function($sub) use ($palabra) {
                            $sub->where('nombre_autor', 'ilike', '%' . $palabra . '%')
                               ->orWhere('cargo_autor', 'ilike', '%' . $palabra . '%')
                               ->orWhere('testimonio', 'ilike', '%' . $palabra . '%');
                        });
                    }
                }
            });
        }

        if ($request->filled('estado')) {
            $tieneFiltro = true;
            $query->where('publicado', $request->estado == 'activo');
        }

        if ($request->filled('desde')) {
            $tieneFiltro = true;
            $query->whereDate('created_at', '>=', $request->desde);
        }

        if ($request->filled('hasta')) {
            $tieneFiltro = true;
            $query->whereDate('created_at', '<=', $request->hasta);
        }

        switch ($request->orden) {
            case 'antiguo': $query->orderBy('created_at', 'asc')->orderBy('id', 'asc'); break;
            case 'az': $query->orderBy('nombre_autor', 'asc'); break;
            case 'za': $query->orderBy('nombre_autor', 'desc'); break;
            default: 
                if ($tieneFiltro) {
                    $query->orderByRaw('LENGTH(nombre_autor), nombre_autor ASC');
                } else {
                    $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
                }
        }

        $testimonios = $query->paginate(10)->appends($request->query());
        return view('admin.testimonios.index', compact('testimonios'));
    }

    public function create()
    {
        return view('admin.testimonios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_autor' => 'required|max:255',
            'cargo_autor' => 'required|max:255',
            'foto_autor' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'testimonio' => 'required',
        ]);

        $this->repararSecuencia();

        $validated['publicado'] = $request->has('publicado');

        if ($request->hasFile('foto_autor')) {
            $validated['foto_autor'] = $request->file('foto_autor')->store('testimonios', 'public');
        }

        Testimonio::create($validated);

        return redirect()->route('admin.testimonios.index')->with('success', 'Testimonio creado exitosamente.');
    }

    public function edit(Testimonio $testimonio)
    {
        return view('admin.testimonios.edit', compact('testimonio'));
    }

    public function update(Request $request, Testimonio $testimonio)
    {
        $validated = $request->validate([
            'nombre_autor' => 'required|max:255',
            'cargo_autor' => 'required|max:255',
            'foto_autor' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'testimonio' => 'required',
        ]);

        $validated['publicado'] = $request->has('publicado');

        if ($request->hasFile('foto_autor')) {
            $validated['foto_autor'] = $request->file('foto_autor')->store('testimonios', 'public');
        }

        $testimonio->update($validated);

        return redirect()->route('admin.testimonios.index')->with('success', 'Testimonio actualizado exitosamente.');
    }

    public function destroy(Testimonio $testimonio)
    {
        $testimonio->delete();
        return redirect()->route('admin.testimonios.index')->with('success', 'Testimonio eliminado exitosamente.');
    }
}