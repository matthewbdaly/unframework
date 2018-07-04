<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class SetHeader
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $response = $next($request, $response);
        return $response->withHeader('X-TEST', 'Testing');
    }
}
