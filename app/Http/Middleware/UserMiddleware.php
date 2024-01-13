<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user adalah user biasa (bukan admin)
        if (auth()->check() && !auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Jika admin atau belum login, redirect ke halaman lain atau kembali
        return redirect('/'); // Sesuaikan dengan URL tujuan jika bukan user
    }
}