<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Belum login
        if (!$user) {
            return redirect()->route('login')
                ->withErrors(['Silakan login terlebih dahulu.']);
        }

        // 🔥 FIX: aman dari null role
        $userRole = $user->role?->name;

        if (!$userRole) {
            abort(403, 'Role tidak ditemukan');
        }

        // Cek role
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}