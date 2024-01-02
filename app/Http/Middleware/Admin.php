<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, \Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return $next($request);
            }
        }
        return redirect('login');
    }
}
