<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
         // Cek apakah pengguna sudah login
         if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // dd(
        //     $user->role, $roles
        // );

        // Cek apakah pengguna memiliki salah satu peran yang diizinkan
        if (!in_array($user->role, $roles)) {
            // Jika tidak, kembalikan response atau redirect sesuai kebutuhan
            return redirect('unauthorized');
        }

        return $next($request);
    }
}
