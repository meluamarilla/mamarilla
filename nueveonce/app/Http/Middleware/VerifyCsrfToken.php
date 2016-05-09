<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'stripe/*',
        'api/v1/funcionarios/*',
        'api/v1/cuentas/*',
        'api/v1/denuncias/*',
        'api/v1/preguntas/*',
        'api/v1/respuestas/*',
        'api/v1/tipodenuncias/*',
    ];
    
    public function handle($request, Closure $next) {
        $regex = '#' . implode('|', $this->except) . '#';
        
        if ($this->isReading($request) || $this->tokensMatch($request) || preg_match($regex, $request->path())) {
            return $this->addCookieToResponse($request, $next($request));
        }
        
        throw new TokenMismatchException;
    }
}
