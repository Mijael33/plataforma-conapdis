<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $query = Curso::where('publicado', true);
        $tieneFiltro = false;

        if ($request->filled('buscar')) {
            $tieneFiltro = true;
            $buscar = $request->buscar;
            $palabras = explode(' ', trim($buscar));
            foreach ($palabras as $palabra) {
                if (strlen($palabra) > 0) {
                    $query->where(function($q) use ($palabra) {
                        $q->where('titulo', 'ilike', '%' . $palabra . '%')
                          ->orWhere('descripcion', 'ilike', '%' . $palabra . '%')
                          ->orWhere('contenido', 'ilike', '%' . $palabra . '%');
                    });
                }
            }
        }

        if ($request->filled('fecha')) {
            $tieneFiltro = true;
            $query->whereDate('fecha_inicio', '<=', $request->fecha)
                  ->whereDate('fecha_final', '>=', $request->fecha);
        }

        if ($tieneFiltro) {
            $query->orderByRaw('LENGTH(titulo), titulo ASC');
        } else {
            $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
        }

        $cursos = $query->paginate(9)->appends($request->query());

        return view('publico.cursos.index', compact('cursos'));
    }

    public function show($slug)
    {
        $curso = Curso::where('slug', $slug)
            ->where('publicado', true)
            ->firstOrFail();

        return view('publico.cursos.show', compact('curso'));
    }
}