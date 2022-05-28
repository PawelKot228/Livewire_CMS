<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::guard('admin')->user()){
            return $next($request);
        }

        return to_route('admin.auth.login');
    }
}
