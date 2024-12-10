<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Menu;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $menuSlug)
    {
        // Ambil role saat ini dari session atau auth
        $role = auth()->user()->role;

        // Ambil menu berdasarkan slug (atau ID) yang dikirim ke middleware
        $menu = Menu::where('slug', $menuSlug)->first();

        if (!$menu) {
            return redirect()->route('dashboard')->with('error', 'Menu tidak ditemukan.');
        }

        // Cek apakah menu_id ada dalam relasi role_menus untuk role saat ini
        $hasAccess = $role->menus->contains($menu->id);

        if (!$hasAccess) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke menu ini.');
        }


        return $next($request);
    }
}
