<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramaNoticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramaNoticiaController extends Controller
{
    public function index(Request $request)
    {
        $query = ProgramaNoticia::query();
        $tieneFiltro = false;

        if ($request->filled('buscar')) {
            $tieneFiltro = true;
            $buscar = $request->buscar;
            $palabras = explode(' ', trim($buscar));
            $query->where(function($q) use ($palabras) {
                foreach ($palabras as $palabra) {
                    if (strlen($palabra) > 0) {
                        $q->where('nombre', 'ilike', '%' . $palabra . '%');
                    }
                }
            });
        }

        if ($request->filled('estado')) {
            $tieneFiltro = true;
            $query->where('activo', $request->estado == 'activo');
        }

        if ($tieneFiltro) {
            $query->orderBy('nombre', 'asc');
        } else {
            $query->orderBy('orden', 'asc')->orderBy('nombre', 'asc');
        }

        $programas = $query->paginate(10)->appends($request->query());
        return view('admin.programas-noticias.index', compact('programas'));
    }

    public function create()
    {
        return view('admin.programas-noticias.create');
    }

    private function generarSlugUnico($nombre, $idExcluir = null)
    {
        $slugBase = Str::slug($nombre);
        $slug = $slugBase;
        $contador = 1;

        $query = ProgramaNoticia::where('slug', $slug);
        if ($idExcluir) {
            $query->where('id', '!=', $idExcluir);
        }

        while ($query->exists()) {
            $slug = $slugBase . '-' . $contador;
            $contador++;

            $query = ProgramaNoticia::where('slug', $slug);
            if ($idExcluir) {
                $query->where('id', '!=', $idExcluir);
            }
        }

        return $slug;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255|unique:programas_noticias,nombre',
            'orden' => 'nullable|integer',
            'activo' => 'nullable',
        ]);

        $programa = new ProgramaNoticia();
        $programa->nombre = $request->nombre;
        $programa->slug = $this->generarSlugUnico($request->nombre);
        $programa->orden = $request->orden ?? 0;
        $programa->activo = $request->has('activo');
        $programa->save();

        return redirect()->route('admin.programas-noticias.index')->with('success', 'Programa de noticias creado exitosamente.');
    }

    public function edit(ProgramaNoticia $programas_noticia)
    {
        return view('admin.programas-noticias.edit', compact('programas_noticia'));
    }

    public function update(Request $request, ProgramaNoticia $programas_noticia)
    {
        $request->validate([
            'nombre' => 'required|max:255|unique:programas_noticias,nombre,' . $programas_noticia->id,
            'orden' => 'nullable|integer',
            'activo' => 'nullable',
        ]);

        $programas_noticia->nombre = $request->nombre;
        if ($programas_noticia->nombre !== $programas_noticia->getOriginal('nombre')) {
            $programas_noticia->slug = $this->generarSlugUnico($request->nombre, $programas_noticia->id);
        }
        $programas_noticia->orden = $request->orden ?? 0;
        $programas_noticia->activo = $request->has('activo');
        $programas_noticia->save();

        return redirect()->route('admin.programas-noticias.index')->with('success', 'Programa de noticias actualizado exitosamente.');
    }

    public function destroy(ProgramaNoticia $programas_noticia)
    {
        $programas_noticia->delete();
        return redirect()->route('admin.programas-noticias.index')->with('success', 'Programa de noticias eliminado exitosamente.');
    }
}