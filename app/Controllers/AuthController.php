<?php declare(strict_types = 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Twig_Environment;

class AuthController
{
    protected $twig;

    protected $response;

    public function __construct(Twig_Environment $twig, ResponseInterface $response)
    {
        $this->twig = $twig;
        $this->response = $response;
    }

    public function show(ServerRequestInterface $request): ResponseInterface
    {
        $tpl = $this->twig->load('login.html');
        $this->response->getBody()->write($tpl->render());
        return $this->response;
    }
}
