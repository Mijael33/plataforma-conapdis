<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    private function generarSlugUnico($titulo, $idExcluir = null)
    {
        $slugBase = Str::slug($titulo);
        $slug = $slugBase;
        $contador = 1;

        $query = Agenda::where('slug', $slug);
        if ($idExcluir) $query->where('id', '!=', $idExcluir);

        while ($query->exists()) {
            $slug = $slugBase . '-' . $contador;
            $contador++;
            $query = Agenda::where('slug', $slug);
            if ($idExcluir) $query->where('id', '!=', $idExcluir);
        }
        return $slug;
    }

    private function repararSecuencia()
    {
        try {
            DB::statement("SELECT setval('agenda_id_seq', GREATEST((SELECT max(id) FROM agenda), 1), true)");
        } catch (\Exception $e) {}
    }

    public function index(Request $request)
    {
        $query = Agenda::query();
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
                               ->orWhere('extracto', 'ilike', '%' . $palabra . '%')
                               ->orWhere('lugar', 'ilike', '%' . $palabra . '%');
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

        $agendas = $query->paginate(10)->appends($request->query());
        return view('admin.agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'extracto' => 'nullable|max:500',
            'contenido' => 'nullable',
            'fecha' => 'required|date',
            'hora' => 'nullable|max:100',
            'lugar' => 'nullable|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $this->repararSecuencia();

        $agenda = new Agenda();
        $agenda->titulo = $request->titulo;
        $agenda->slug = $this->generarSlugUnico($request->titulo);
        $agenda->extracto = $request->extracto;
        $agenda->contenido = $request->contenido;
        $agenda->fecha = $request->fecha;
        $agenda->hora = $request->hora;
        $agenda->lugar = $request->lugar;
        $agenda->publicado = $request->has('publicado');

        if ($request->hasFile('imagen')) {
            $agenda->imagen = $request->file('imagen')->store('agenda', 'public');
        }

        $agenda->save();

        return redirect()->route('admin.agenda.index')->with('success', 'Evento creado exitosamente.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'extracto' => 'nullable|max:500',
            'contenido' => 'nullable',
            'fecha' => 'required|date',
            'hora' => 'nullable|max:100',
            'lugar' => 'nullable|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $agenda->titulo = $request->titulo;
        if ($agenda->titulo !== $agenda->getOriginal('titulo')) {
            $agenda->slug = $this->generarSlugUnico($request->titulo, $agenda->id);
        }
        $agenda->extracto = $request->extracto;
        $agenda->contenido = $request->contenido;
        $agenda->fecha = $request->fecha;
        $agenda->hora = $request->hora;
        $agenda->lugar = $request->lugar;
        $agenda->publicado = $request->has('publicado');

        if ($request->hasFile('imagen')) {
            $agenda->imagen = $request->file('imagen')->store('agenda', 'public');
        }

        $agenda->save();

        return redirect()->route('admin.agenda.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agenda.index')->with('success', 'Evento eliminado exitosamente.');
    }
}