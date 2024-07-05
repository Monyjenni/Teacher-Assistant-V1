<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\IsAdmin::class,
        'teacher' => \App\Http\Middleware\IsTeacher::class,

    ];

}
