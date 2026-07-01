<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PuntoCertificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuntoCertificacionController extends Controller
{
    private function repararSecuencia()
    {
        try {
            DB::statement("SELECT setval('puntos_certificacion_id_seq', GREATEST((SELECT max(id) FROM puntos_certificacion), 1), true)");
        } catch (\Exception $e) {}
    }

    public function index(Request $request)
    {
        $query = PuntoCertificacion::query();

        if ($request->filled('buscar')) {
            $query->where(function($q) use ($request) {
                $q->where('estado', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('ubicacion', 'ilike', '%'.$request->buscar.'%');
            });
        }

        if ($request->filled('estado')) {
            $query->where('activo', $request->estado == 'activo');
        }

        switch ($request->orden) {
            case 'antiguo': $query->orderBy('created_at', 'asc'); break;
            case 'az': $query->orderBy('estado', 'asc'); break;
            case 'za': $query->orderBy('estado', 'desc'); break;
            default: $query->orderBy('orden', 'asc')->orderBy('fecha', 'desc');
        }

        $puntos = $query->paginate(30)->appends($request->query());
        return view('admin.puntos-certificacion.index', compact('puntos'));
    }

    public function create()
    {
        return view('admin.puntos-certificacion.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'estado' => 'required|max:255',
            'ubicaciones' => 'required|array|min:1',
            'ubicaciones.*' => 'required|string|max:5000',
            'fecha' => 'required|date',
            'hora' => 'nullable|max:50',
            'hora_fin' => 'nullable|max:50',
            'dias' => 'nullable|array',
            'dias.*' => 'in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
            'orden' => 'nullable|integer',
        ]);

        $this->repararSecuencia();

        $ubicaciones = array_filter($validated['ubicaciones'], function($u) {
            return !empty(trim($u));
        });

        $dias = $request->has('dias') ? implode(', ', $request->dias) : null;

        PuntoCertificacion::create([
            'estado' => $validated['estado'],
            'ubicacion' => implode("\n\n", $ubicaciones),
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'] ?? null,
            'hora_fin' => $validated['hora_fin'] ?? null,
            'dias' => $dias,
            'orden' => $validated['orden'] ?? 0,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('admin.puntos-certificacion.index')->with('success', 'Punto de certificación creado exitosamente.');
    }

    public function edit(PuntoCertificacion $puntos_certificacion)
    {
        return view('admin.puntos-certificacion.edit', compact('puntos_certificacion'));
    }

    public function update(Request $request, PuntoCertificacion $puntos_certificacion)
    {
        $validated = $request->validate([
            'estado' => 'required|max:255',
            'ubicaciones' => 'required|array|min:1',
            'ubicaciones.*' => 'required|string|max:5000',
            'fecha' => 'required|date',
            'hora' => 'nullable|max:50',
            'hora_fin' => 'nullable|max:50',
            'dias' => 'nullable|array',
            'dias.*' => 'in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
            'orden' => 'nullable|integer',
        ]);

        $ubicaciones = array_filter($validated['ubicaciones'], function($u) {
            return !empty(trim($u));
        });

        $dias = $request->has('dias') ? implode(', ', $request->dias) : null;

        $puntos_certificacion->update([
            'estado' => $validated['estado'],
            'ubicacion' => implode("\n\n", $ubicaciones),
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'] ?? null,
            'hora_fin' => $validated['hora_fin'] ?? null,
            'dias' => $dias,
            'orden' => $validated['orden'] ?? 0,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('admin.puntos-certificacion.index')->with('success', 'Punto de certificación actualizado exitosamente.');
    }

    public function destroy(PuntoCertificacion $puntos_certificacion)
    {
        $puntos_certificacion->delete();
        return redirect()->route('admin.puntos-certificacion.index')->with('success', 'Punto de certificación eliminado exitosamente.');
    }
}