<?php declare(strict_types = 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Twig_Environment;

class AuthController
{
    protected $twig;

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $tpl = $this->twig->load('login.html');
        $response->getBody()->write($tpl->render());
        return $response;
    }
}
