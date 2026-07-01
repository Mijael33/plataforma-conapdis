<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    private function generarSlugUnico($titulo, $idExcluir = null)
    {
        $slugBase = Str::slug($titulo);
        $slug = $slugBase;
        $contador = 1;

        $query = Curso::where('slug', $slug);
        if ($idExcluir) $query->where('id', '!=', $idExcluir);

        while ($query->exists()) {
            $slug = $slugBase . '-' . $contador;
            $contador++;
            $query = Curso::where('slug', $slug);
            if ($idExcluir) $query->where('id', '!=', $idExcluir);
        }
        return $slug;
    }

    private function repararSecuencia()
    {
        try {
            $maxId = DB::table('cursos')->max('id') ?? 0;
            DB::statement("SELECT setval('cursos_id_seq', GREATEST((SELECT max(id) FROM cursos), 1), true)");
        } catch (\Exception $e) {}
    }

    public function index(Request $request)
    {
        $query = Curso::query();
        $tieneFiltro = false;

        if ($request->filled('buscar')) {
            $tieneFiltro = true;
            $buscar = $request->buscar;
            $palabras = explode(' ', trim($buscar));
            $query->where(function($q) use ($palabras) {
                foreach ($palabras as $palabra) {
                    if (strlen($palabra) > 0) {
                        $q->where(function($sub) use ($palabra) {
                            $sub->where('titulo', 'ilike', '%' . $palabra . '%')
                               ->orWhere('descripcion', 'ilike', '%' . $palabra . '%');
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
            case 'az': $query->orderBy('titulo', 'asc'); break;
            case 'za': $query->orderBy('titulo', 'desc'); break;
            default: 
                if ($tieneFiltro) {
                    $query->orderByRaw('LENGTH(titulo), titulo ASC');
                } else {
                    $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
                }
        }

        $cursos = $query->paginate(10)->appends($request->query());
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'contenido' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'video_url' => 'nullable|url',
            'link_curso' => 'nullable|url',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $this->repararSecuencia();

        $validated['slug'] = $this->generarSlugUnico($validated['titulo']);
        $validated['publicado'] = $request->has('publicado'); // ← CORREGIDO

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('cursos', 'public');
        }

        Curso::create($validated);

        return redirect()->route('admin.cursos.index')->with('success', 'Curso creado exitosamente.');
    }

    public function show(Curso $curso)
    {
        return view('admin.cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'contenido' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'video_url' => 'nullable|url',
            'link_curso' => 'nullable|url',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        if ($validated['titulo'] !== $curso->titulo) {
            $validated['slug'] = $this->generarSlugUnico($validated['titulo'], $curso->id);
        }

        $validated['publicado'] = $request->has('publicado'); // ← CORREGIDO

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('cursos', 'public');
        }

        $curso->update($validated);

        return redirect()->route('admin.cursos.index')->with('success', 'Curso actualizado exitosamente.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('admin.cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}