<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        $query = Noticia::query();
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
                               ->orWhere('categoria', 'ilike', '%' . $palabra . '%');
                        });
                    }
                }
            });
        }

        if ($request->filled('estado')) {
            $tieneFiltro = true;
            $query->where('publicado', $request->estado == 'activo');
        }

        // 🆕 Filtro de Banner
        if ($request->filled('banner')) {
            $tieneFiltro = true;
            if ($request->banner === 'destacadas') {
                $query->where('destacado_banner', true);
            } elseif ($request->banner === 'no_destacadas') {
                $query->where('destacado_banner', false);
            }
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

        $noticias = $query->paginate(10)->appends($request->query());
        return view('admin.noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('admin.noticias.create');
    }

    private function generarSlugUnico($titulo, $idExcluir = null)
    {
        $slugBase = Str::slug($titulo);
        $slug = $slugBase;
        $contador = 1;

        $query = Noticia::where('slug', $slug);
        if ($idExcluir) {
            $query->where('id', '!=', $idExcluir);
        }

        while ($query->exists()) {
            $slug = $slugBase . '-' . $contador;
            $contador++;
            
            $query = Noticia::where('slug', $slug);
            if ($idExcluir) {
                $query->where('id', '!=', $idExcluir);
            }
        }

        return $slug;
    }

    private function repararSecuencia($tabla)
    {
        try {
            $seqName = $tabla . '_id_seq';
            $maxId = DB::table($tabla)->max('id') ?? 0;
            DB::statement("SELECT setval('{$seqName}', GREATEST((SELECT max(id) FROM \"{$tabla}\"), 1), true)");
        } catch (\Exception $e) {
            // Si falla, no es crítico
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'extracto' => 'required|max:500',
            'contenido' => 'required',
            'categoria' => 'required|max:100',
            'tipo' => 'required|in:conapdis-informa,conapdis-informa-lsv,conapdito-y-conapdita',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'fecha_publicacion' => 'nullable|date',
            'publicado' => 'nullable',
            'destacado_banner' => 'nullable',
            'orden_banner' => 'nullable|integer',
        ]);

        $this->repararSecuencia('noticias');

        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->slug = $this->generarSlugUnico($request->titulo);
        $noticia->extracto = $request->extracto;
        $noticia->contenido = $request->contenido;
        $noticia->categoria = $request->categoria;
        $noticia->tipo = $request->tipo;
        $noticia->fecha_publicacion = $request->fecha_publicacion;
        $noticia->publicado = $request->has('publicado');
        $noticia->destacado_banner = $request->has('destacado_banner');
        $noticia->orden_banner = $request->orden_banner ?? 0;

        if ($request->hasFile('imagen')) {
            $noticia->imagen = $request->file('imagen')->store('noticias', 'public');
        }

        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia creada.');
    }

    public function edit(Noticia $noticia)
    {
        return view('admin.noticias.edit', compact('noticia'));
    }

    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'extracto' => 'required|max:500',
            'contenido' => 'required',
            'categoria' => 'required|max:100',
            'tipo' => 'required|in:conapdis-informa,conapdis-informa-lsv,conapdito-y-conapdita',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'fecha_publicacion' => 'nullable|date',
            'publicado' => 'nullable',
            'destacado_banner' => 'nullable',
            'orden_banner' => 'nullable|integer',
        ]);

        $noticia->titulo = $request->titulo;
        if ($noticia->titulo !== $noticia->getOriginal('titulo')) {
            $noticia->slug = $this->generarSlugUnico($request->titulo, $noticia->id);
        }
        $noticia->extracto = $request->extracto;
        $noticia->contenido = $request->contenido;
        $noticia->categoria = $request->categoria;
        $noticia->tipo = $request->tipo;
        $noticia->fecha_publicacion = $request->fecha_publicacion;
        $noticia->publicado = $request->has('publicado');
        $noticia->destacado_banner = $request->has('destacado_banner');
        $noticia->orden_banner = $request->orden_banner ?? 0;

        if ($request->hasFile('imagen')) {
            $noticia->imagen = $request->file('imagen')->store('noticias', 'public');
        }

        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia actualizada.');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('admin.noticias.index')->with('success', 'Noticia eliminada.');
    }
}