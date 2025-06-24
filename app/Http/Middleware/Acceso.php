<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Acceso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() == false) {

            // Si el usuario no está autenticado, redirige a la página de inicio de sesión

            return redirect()->route('login_index')->with('error', 'Debes iniciar sesión para continuar.');
        }

        return $next($request);
    }
}
