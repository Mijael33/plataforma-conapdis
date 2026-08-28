<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RedSocial;
use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    public function index(Request $request)
    {
        $query = RedSocial::query();

        if ($request->filled('buscar')) {
            $query->where(function($q) use ($request) {
                $q->where('nombre_cuenta', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('vinculo', 'ilike', '%'.$request->buscar.'%');
            });
        }

        if ($request->filled('estado')) {
            $query->where('activo', $request->estado == 'activo');
        }

        switch ($request->orden) {
            case 'antiguo': $query->orderBy('created_at', 'asc'); break;
            case 'az': $query->orderBy('nombre_cuenta', 'asc'); break;
            case 'za': $query->orderBy('nombre_cuenta', 'desc'); break;
            default: $query->orderBy('destacado', 'desc')->orderBy('orden', 'asc');
        }

        $redes = $query->paginate(20)->appends($request->query());
        return view('admin.redes.index', compact('redes'));
    }

    public function create() { return view('admin.redes.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'red' => 'required|in:instagram,facebook,tiktok,youtube,telegram',
            'nombre_cuenta' => 'required|max:255',
            'vinculo' => 'required|url|max:500',
            'orden' => 'nullable|integer',
        ]);
        $validated['destacado'] = $request->has('destacado');
        $validated['activo'] = $request->has('activo');
        RedSocial::create($validated);
        return redirect()->route('admin.redes.index')->with('success', 'Cuenta creada exitosamente.');
    }

    public function edit($id)
    {
        $rede = RedSocial::findOrFail($id);
        return view('admin.redes.edit', compact('rede'));
    }

    public function update(Request $request, $id)
    {
        $rede = RedSocial::findOrFail($id);

        $validated = $request->validate([
            'red' => 'required|in:instagram,facebook,tiktok,youtube,telegram',
            'nombre_cuenta' => 'required|max:255',
            'vinculo' => 'required|url|max:500',
            'orden' => 'nullable|integer',
        ]);
        $validated['destacado'] = $request->has('destacado');
        $validated['activo'] = $request->has('activo');
        $rede->update($validated);
        return redirect()->route('admin.redes.index')->with('success', 'Cuenta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $rede = RedSocial::findOrFail($id);
        $rede->delete();
        return redirect()->route('admin.redes.index')->with('success', 'Cuenta eliminada exitosamente.');
    }
}