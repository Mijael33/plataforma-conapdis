<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        $query = Noticia::where('publicado', true)->where('tipo', 'conapdis-informa');
        $tieneFiltro = false;

        if ($request->filled('buscar')) {
            $tieneFiltro = true;
            $buscar = $request->buscar;
            $palabras = explode(' ', trim($buscar));
            foreach ($palabras as $palabra) {
                if (strlen($palabra) > 0) {
                    $query->where(function($q) use ($palabra) {
                        $q->where('titulo', 'ilike', '%' . $palabra . '%')
                          ->orWhere('extracto', 'ilike', '%' . $palabra . '%')
                          ->orWhere('contenido', 'ilike', '%' . $palabra . '%')
                          ->orWhere('categoria', 'ilike', '%' . $palabra . '%');
                    });
                }
            }
        }

        if ($request->filled('categoria')) {
            $tieneFiltro = true;
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('fecha')) {
            $tieneFiltro = true;
            $query->whereDate('fecha_publicacion', $request->fecha);
        }

        if ($tieneFiltro) {
            $query->orderByRaw('LENGTH(titulo), titulo ASC');
        } else {
            $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
        }

        $noticias = $query->paginate(9)->appends($request->query());
        $categorias = Noticia::where('publicado', true)->where('tipo', 'conapdis-informa')
            ->select('categoria')->distinct()->pluck('categoria');

        return view('publico.noticias.index', compact('noticias', 'categorias'));
    }

    public function informa(Request $request)
    {
        $query = Noticia::where('publicado', true)->where('tipo', 'conapdis-informa');
        $tieneFiltro = false;

        if ($request->filled('buscar')) {
            $tieneFiltro = true;
            $buscar = $request->buscar;
            $palabras = explode(' ', trim($buscar));
            foreach ($palabras as $palabra) {
                if (strlen($palabra) > 0) {
                    $query->where(function($q) use ($palabra) {
                        $q->where('titulo', 'ilike', '%' . $palabra . '%')
                          ->orWhere('extracto', 'ilike', '%' . $palabra . '%')
                          ->orWhere('contenido', 'ilike', '%' . $palabra . '%')
                          ->orWhere('categoria', 'ilike', '%' . $palabra . '%');
                    });
                }
            }
        }

        if ($request->filled('categoria')) {
            $tieneFiltro = true;
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('fecha')) {
            $tieneFiltro = true;
            $query->whereDate('fecha_publicacion', $request->fecha);
        }

        if ($tieneFiltro) {
            $query->orderByRaw('LENGTH(titulo), titulo ASC');
        } else {
            $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
        }

        $noticias = $query->paginate(9)->appends($request->query());
        $categorias = Noticia::where('publicado', true)->where('tipo', 'conapdis-informa')
            ->select('categoria')->distinct()->pluck('categoria');
        $titulo = 'CONAPDIS Informa';

        return view('publico.noticias.index', compact('noticias', 'categorias', 'titulo'));
    }

    public function informaLsv(Request $request)
    {
        $query = Noticia::where('publicado', true)->where('tipo', 'conapdis-informa-lsv');
        $tieneFiltro = false;

        if ($request->filled('buscar')) {
            $tieneFiltro = true;
            $buscar = $request->buscar;
            $palabras = explode(' ', trim($buscar));
            foreach ($palabras as $palabra) {
                if (strlen($palabra) > 0) {
                    $query->where(function($q) use ($palabra) {
                        $q->where('titulo', 'ilike', '%' . $palabra . '%')
                          ->orWhere('extracto', 'ilike', '%' . $palabra . '%')
                          ->orWhere('contenido', 'ilike', '%' . $palabra . '%')
                          ->orWhere('categoria', 'ilike', '%' . $palabra . '%');
                    });
                }
            }
        }

        if ($request->filled('categoria')) {
            $tieneFiltro = true;
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('fecha')) {
            $tieneFiltro = true;
            $query->whereDate('fecha_publicacion', $request->fecha);
        }

        if ($tieneFiltro) {
            $query->orderByRaw('LENGTH(titulo), titulo ASC');
        } else {
            $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
        }

        $noticias = $query->paginate(9)->appends($request->query());
        $categorias = Noticia::where('publicado', true)->where('tipo', 'conapdis-informa-lsv')
            ->select('categoria')->distinct()->pluck('categoria');
        $titulo = 'CONAPDIS Informa LSV';

        return view('publico.noticias.index', compact('noticias', 'categorias', 'titulo'));
    }

    public function conapdito(Request $request)
    {
        $query = Noticia::where('publicado', true)->where('tipo', 'conapdito-y-conapdita');
        $tieneFiltro = false;

        if ($request->filled('buscar')) {
            $tieneFiltro = true;
            $buscar = $request->buscar;
            $palabras = explode(' ', trim($buscar));
            foreach ($palabras as $palabra) {
                if (strlen($palabra) > 0) {
                    $query->where(function($q) use ($palabra) {
                        $q->where('titulo', 'ilike', '%' . $palabra . '%')
                          ->orWhere('extracto', 'ilike', '%' . $palabra . '%')
                          ->orWhere('contenido', 'ilike', '%' . $palabra . '%')
                          ->orWhere('categoria', 'ilike', '%' . $palabra . '%');
                    });
                }
            }
        }

        if ($request->filled('categoria')) {
            $tieneFiltro = true;
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('fecha')) {
            $tieneFiltro = true;
            $query->whereDate('fecha_publicacion', $request->fecha);
        }

        if ($tieneFiltro) {
            $query->orderByRaw('LENGTH(titulo), titulo ASC');
        } else {
            $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
        }

        $noticias = $query->paginate(9)->appends($request->query());
        $categorias = Noticia::where('publicado', true)->where('tipo', 'conapdito-y-conapdita')
            ->select('categoria')->distinct()->pluck('categoria');
        $titulo = 'Conapdito y Conapdita';

        return view('publico.noticias.index', compact('noticias', 'categorias', 'titulo'));
    }

    public function show($slug)
    {
        $noticia = Noticia::where('slug', $slug)
            ->where('publicado', true)
            ->firstOrFail();

        $relacionadas = Noticia::where('publicado', true)
            ->where('id', '!=', $noticia->id)
            ->where('tipo', $noticia->tipo)
            ->orderBy('created_at', 'desc')->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('publico.noticias.show', compact('noticia', 'relacionadas'));
    }
}