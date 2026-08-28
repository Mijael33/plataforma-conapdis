<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UsuarioController extends Controller
{
    private function repararSecuencia()
    {
        try {
            DB::statement("SELECT setval('users_id_seq', GREATEST((SELECT max(id) FROM users), 1), true)");
        } catch (\Exception $e) {}
    }

    public function index(Request $request)
    {
        $query = User::with('rol');

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->where(function($q) use ($buscar) {
                $q->where('nombre', 'ilike', '%'.$buscar.'%')
                  ->orWhere('apellido', 'ilike', '%'.$buscar.'%')
                  ->orWhere('cedula', 'ilike', '%'.$buscar.'%')
                  ->orWhere('email', 'ilike', '%'.$buscar.'%');
            });
        }

        if ($request->filled('estado')) {
            $query->where('activo', $request->estado == 'activo');
        }

        if ($request->filled('rol')) {
            $query->where('rol_id', $request->rol);
        }

        switch ($request->orden) {
            case 'antiguo': $query->orderBy('created_at', 'asc'); break;
            case 'az': $query->orderBy('nombre', 'asc'); break;
            case 'za': $query->orderBy('nombre', 'desc'); break;
            default: $query->orderBy('created_at', 'desc');
        }

        $usuarios = $query->paginate(10)->appends($request->query());
        $roles = Rol::orderBy('nombre')->get();
        return view('admin.usuarios.index', compact('usuarios', 'roles'));
    }

    public function create()
    {
        $roles = Rol::where('activo', true)->orderBy('nombre')->get();
        return view('admin.usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cedula' => 'required|max:20|unique:users,cedula',
            'cargo' => 'nullable|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            'rol_id' => 'required|exists:roles,id',
        ]);

        $this->repararSecuencia();

        User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cedula' => $request->cedula,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol_id' => $request->rol_id,
            'activo' => true,
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(User $usuario)
    {
        $roles = Rol::where('activo', true)->orderBy('nombre')->get();
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cedula' => 'required|max:20|unique:users,cedula,'.$usuario->id,
            'cargo' => 'nullable|max:255',
            'email' => 'required|email|unique:users,email,'.$usuario->id,
            'password' => 'nullable|confirmed|min:8',
            'rol_id' => 'required|exists:roles,id',
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->cargo = $request->cargo;
        $usuario->email = $request->email;
        $usuario->rol_id = $request->rol_id;
        $usuario->activo = $request->has('activo');

        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return back()->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}