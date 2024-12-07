<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Middleware\TrustProxies as Middleware;


class TrustProxies extends Middleware
{
    protected $proxies;
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
