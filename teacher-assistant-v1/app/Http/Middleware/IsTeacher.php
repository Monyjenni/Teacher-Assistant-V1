<?php

// app\Http\Middleware\IsTeacher.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsTeacher
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_teacher) {
            return $next($request);
        }

        return redirect('home')->with('error', 'You do not have teacher access.');
    }
}


