<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    protected function hosts()
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }

    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
