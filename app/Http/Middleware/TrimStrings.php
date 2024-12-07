<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    protected $except = [
        'password',
        'password_confirmation',
    ];
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
