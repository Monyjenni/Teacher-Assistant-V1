<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        // other middleware
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
        'is_teacher' => \App\Http\Middleware\IsTeacher::class,
    ];

}
