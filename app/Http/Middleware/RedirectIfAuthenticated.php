<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard($guards)->check()) {
            // Tambahkan logika untuk role
            $userRole = Auth::user()->role->role_name ?? null;
            if ($userRole === 'Customer') {
                return redirect('/landing-page');
            }

            return redirect('/dashboard'); // Default untuk role lainnya
        }

        return $next($request);
    }
}
