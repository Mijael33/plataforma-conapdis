<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    private $areas = [
        'dashboard' => 'Panel de Control',
        'programas_noticias' => 'Programas de Noticias',
        'noticias' => 'Noticias',
        'cursos' => 'Cursos',
        'testimonios' => 'Testimonios',
        'agenda' => 'Agenda',
        'marco_juridico' => 'Marco Jurídico',
        'linea_tiempo' => 'Línea de Tiempo',
        'departamentos' => 'Departamentos',
        'personas' => 'Personas',
        'redes' => 'Redes Sociales',
        'enlaces' => 'CONAPDIS en Línea',
        'instituciones' => 'Instituciones Aliadas',
        'coordinaciones' => 'Coordinaciones',
        'puntos_certificacion' => 'Puntos de Certificación',
        'usuarios' => 'Usuarios',
        'roles' => 'Roles',
    ];

    // Acciones estándar para la mayoría de áreas
    private $acciones = ['ver', 'crear', 'editar', 'eliminar'];

    // Acciones especiales para el dashboard
    private $accionesDashboard = ['ver_metricas', 'gestionar_mantenimiento'];

    public function index()
    {
        $roles = Rol::orderBy('nombre', 'asc')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $areas = $this->areas;
        $acciones = $this->acciones;
        $accionesDashboard = $this->accionesDashboard;
        return view('admin.roles.create', compact('areas', 'acciones', 'accionesDashboard'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255|unique:roles,nombre',
            'descripcion' => 'nullable|max:500',
            'es_admin' => 'nullable',
            'permisos' => 'nullable|array',
        ]);

        $permisos = [];
        if (!$request->has('es_admin') && $request->has('permisos')) {
            foreach ($request->permisos as $area => $acciones) {
                $permisos[$area] = array_values($acciones);
            }
        }

        Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'es_admin' => $request->has('es_admin'),
            'permisos' => $request->has('es_admin') ? null : $permisos,
            'activo' => true,
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Rol creado exitosamente.');
    }

    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        $areas = $this->areas;
        $acciones = $this->acciones;
        $accionesDashboard = $this->accionesDashboard;
        $permisosRol = $rol->permisos ?? [];
        return view('admin.roles.edit', compact('rol', 'areas', 'acciones', 'accionesDashboard', 'permisosRol'));
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:255|unique:roles,nombre,' . $rol->id,
            'descripcion' => 'nullable|max:500',
            'es_admin' => 'nullable',
            'permisos' => 'nullable|array',
        ]);

        $permisos = [];
        if (!$request->has('es_admin') && $request->has('permisos')) {
            foreach ($request->permisos as $area => $acciones) {
                $permisos[$area] = array_values($acciones);
            }
        }

        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->es_admin = $request->has('es_admin');
        $rol->permisos = $request->has('es_admin') ? null : $permisos;
        $rol->activo = $request->has('activo');
        $rol->save();

        return redirect()->route('admin.roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);

        if ($rol->usuarios()->count() > 0) {
            return back()->with('error', 'No se puede eliminar: hay usuarios con este rol asignado.');
        }

        $rol->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}