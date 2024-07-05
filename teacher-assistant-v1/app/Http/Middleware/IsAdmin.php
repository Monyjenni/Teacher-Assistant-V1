<?php

// app\Http\Middleware\IsAdmin.php

// app\Http\Middleware\IsAdmin.php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        return redirect('home')->with('error', 'You do not have admin access.');
    }
}



