<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // El middleware creado se debe registrar en el archivo app/Http/Kernel.php en $middlewareAliases con 'is_admin' => IsAdmin::class
    // De esta forma, ahora podremos usarlo en las rutas o controladores con el alias 'is_admin'

    public function handle(Request $request, Closure $next): Response
    {
        // Validar que el usuario sea administrador por medio del helper user()
        // Si no es administrador, retornar pagina de error o que no tiene permisos

        /**
         * Forzamos a Intelephense (el analizador de código de VS Code) a reconocer
         * que auth()->user() retorna una instancia del modelo App\Models\User.
         *
         * Esto permite el autocompletado y evita el error "Undefined method isAdmin"
         * cuando llamamos a métodos personalizados como isAdmin() o isReader().
         */
        if (auth()->user()->isAdmin()) {
            return $next($request);
        }

        abort(403, 'No tienes permisos para acceder a esta sección'); // se retorna un error 403 si no es administrador

        /* ASI SERIA EL CODIGO NORMAL SIN EL COMENTARIO PARA INTELEPHENSE
        if (auth()->user()->isAdmin()) {
            return $next($request); // se continuara con la siguiente accion normalmente
        }
        */
    }
}