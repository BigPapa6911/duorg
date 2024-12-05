<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * As URIs que devem ser ignoradas na verificação CSRF.
     */
    protected $except = [
        'api/*', // Ignorar todas as rotas do api.php
    ];
    public function handle($request, Closure $next)
{
    return $next($request);
}
    
}
