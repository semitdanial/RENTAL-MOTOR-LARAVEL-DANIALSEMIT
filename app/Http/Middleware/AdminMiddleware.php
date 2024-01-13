<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user adalah admin
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman lain atau kembali
        return redirect('/'); // Sesuaikan dengan URL tujuan jika bukan admin
    }
}
