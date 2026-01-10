<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user login DAN apakah user adalah admin
        if (!auth()->check() || !auth()->user()->is_admin) {
            // Jika tidak login atau bukan admin, redirect ke home
            return redirect('/')->with('error', 'You are not authorized to access this page.');
        }

        // Jika login dan admin, lanjutkan request
        return $next($request);
    }
}