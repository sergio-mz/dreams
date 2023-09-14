<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            // Obtén el usuario actual
            $user = auth()->user();

            // Verifica si el usuario tiene el campo 'status' igual a 1
            if ($user->status === 1 && $user->roles->first()->status === 1) {
                return $next($request);
            }
            // Si el usuario tiene 'status' igual a 0, cierra la sesión y redirige a la página de inicio
            app(AuthenticatedSessionController::class)->destroy($request);

            // Limpia completamente la sesión actual
            Session::invalidate();

            return redirect()->route('inicio')->with('status', 'Tu cuenta está deshabilitada.');
        }
    }
}
