<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Buscar usuario por email
        $user = User::where('email', $credentials['email'])->first();

        // Verificar si el usuario existe
        if (!$user) {
            return back()->withErrors([
                'email' => 'Usuario o contraseña incorrectos.',
            ])->onlyInput('email');
        }

        // Verificar si el usuario está activo
        if (!$user->activo) {
            return back()->withErrors([
                'email' => 'Este usuario está inactivo. Contacta al administrador.',
            ])->onlyInput('email');
        }

        // Verificar si tiene rol asignado
        if (!$user->rol) {
            return back()->withErrors([
                'email' => 'Tu cuenta no tiene un rol asignado. Contacta al administrador.',
            ])->onlyInput('email');
        }

        // Verificar si el rol está activo
        if (!$user->rol->activo) {
            return back()->withErrors([
                'email' => 'Tu rol ha sido desactivado. Contacta al administrador.',
            ])->onlyInput('email');
        }

        // Verificar contraseña
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Usuario o contraseña incorrectos.',
            ])->onlyInput('email');
        }

        // Login
        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}