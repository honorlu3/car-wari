<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // si no estas logeado, puede ver la vista pública
        if (!auth()->check()) {
            return $next($request);
        }
        //si esta logueado como user puede continuar
        if(auth()->user()->role === 'user'){
            return $next($request);
        }
        //si es admin, redirige al panel de admin
        if(auth()->user()->role === 'admin'){
            return redirect()->route('admin.dashboard')->with('error', 'Acceso denegado. Solo usuarios normales permitidos.'); 
        }
        //en cualquier otro caso, redirige al inicio
        return redirect('/')->with('error', 'Acceso denegado. Solo usuarios normales permitidos.');
 }
}
