<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $query = User::query();

        if ($request->filled('buscar')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'ilike', '%'.$request->buscar.'%')
                  ->orWhere('email', 'ilike', '%'.$request->buscar.'%');
            });
        }

        if ($request->filled('estado')) {
            $query->where('activo', $request->estado == 'activo');
        }

        if ($request->filled('desde')) {
            $query->whereDate('created_at', '>=', $request->desde);
        }

        if ($request->filled('hasta')) {
            $query->whereDate('created_at', '<=', $request->hasta);
        }

        switch ($request->orden) {
            case 'antiguo': $query->orderBy('created_at', 'asc'); break;
            case 'az': $query->orderBy('name', 'asc'); break;
            case 'za': $query->orderBy('name', 'desc'); break;
            default: $query->orderBy('created_at', 'desc');
        }

        $usuarios = $query->paginate(10)->appends($request->query());
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'rol' => 'required|in:admin,editor',
        ]);

        $this->repararSecuencia();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => $request->rol,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(User $usuario)
    {
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$usuario->id,
            'password' => 'nullable|min:8',
            'rol' => 'required|in:admin,editor',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;
        $usuario->activo = $request->has('activo');

        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}