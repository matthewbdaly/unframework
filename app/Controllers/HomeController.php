<?php declare(strict_types = 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Twig_Environment;

class HomeController
{
    protected $twig;

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function index(ServerRequestInterface $request, ResponseInterface $response)
    {
        $tpl = $this->twig->load('index.html');
        $response->getBody()->write($tpl->render());
        return $response;
    }
}
