<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsReader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario NO ES administrador, entonces podra ejecutar la siguiente accion

        if (auth()->user()->isReader()) {
            return $next($request);
        }

        abort(403, 'No tienes permisos para acceder a esta sección');
    }
}
