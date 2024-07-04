<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_admin) {
            return $next($request);
        }

        return redirect('home')->with('error', 'You have not admin access');
    }
}

