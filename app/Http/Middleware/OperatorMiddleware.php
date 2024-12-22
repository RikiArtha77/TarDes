<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('operator')->check()) {
            return $next($request);
        }

        return redirect()->route('operator.LoginForm')->withErrors(['login' => 'Silakan login sebagai operator.']);
    }
}