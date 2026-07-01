<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\MarcoJuridico;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    public function mision()
    {
        return view('publico.institucion.mision');
    }

    public function vision()
    {
        return view('publico.institucion.vision');
    }

    public function resena()
    {
        return view('publico.institucion.resena');
    }

    public function principios()
    {
        return view('publico.institucion.principios');
    }

    public function marcoJuridico()
    {
        $leyes = MarcoJuridico::where('activo', true)
            ->orderBy('orden', 'asc')
            ->get();
            
        return view('publico.institucion.marco-juridico', compact('leyes'));
    }

    public function agenda(Request $request)
    {
        $query = Agenda::where('publicado', true);
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
                          ->orWhere('lugar', 'ilike', '%' . $palabra . '%');
                    });
                }
            }
        }

        if ($request->filled('fecha')) {
            $tieneFiltro = true;
            $query->whereDate('fecha', $request->fecha);
        }

        if ($tieneFiltro) {
            $query->orderByRaw('LENGTH(titulo), titulo ASC');
        } else {
            $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
        }

        $eventos = $query->paginate(9)->appends($request->query());
            
        return view('publico.institucion.agenda', compact('eventos'));
    }

    public function agendaShow($slug)
    {
        $evento = Agenda::where('slug', $slug)
            ->where('publicado', true)
            ->firstOrFail();
            
        return view('publico.institucion.agenda_show', compact('evento'));
    }
}