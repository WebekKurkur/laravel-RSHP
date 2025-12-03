<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDokter
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
            // Ambil role dari session
            $userRole = session('user_role');

            // Jika role sesuai, lanjutkan
            if ($userRole == 2) {
                return $next($request);
            } else {
                return back()->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
            }
    }
}
