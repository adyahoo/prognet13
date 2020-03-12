<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware extends Middleware
{

    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
