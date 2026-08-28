<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarPermiso
{
    public function handle(Request $request, Closure $next, $area = null, $accion = null): Response
    {
        $user = auth()->user();

        // Si es admin total, puede todo
        if ($user && $user->isAdmin()) {
            return $next($request);
        }

        // Si no hay usuario autenticado
        if (!$user) {
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }

        // Si no se especifica área o acción, solo verificar que tenga el rol
        if ($area && $accion) {
            if (!$user->tienePermiso($area, $accion)) {
                abort(403, 'No tienes permisos para ' . $accion . ' en ' . $area . '.');
            }
        }

        return $next($request);
    }
}