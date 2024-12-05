<?php

namespace App\Http\Middleware;

use Closure;

class DebugMiddleware
{
    public function handle($request, Closure $next)
    {
        \Log::info('Headers:', $request->headers->all());
        \Log::info('Cookies:', $request->cookies->all());
        \Log::info('CSRF Token:', $request->input('_token'));

        return $next($request);
    }
}
