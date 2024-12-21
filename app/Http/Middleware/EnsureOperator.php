<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureOperator
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah session memiliki autentikasi operator
        if (!session()->has('is_operator') || !session('is_operator')) {
            return redirect()->route('operator.login')->with('error', 'Akses ditolak!');
        }

        return $next($request);
    }
}

