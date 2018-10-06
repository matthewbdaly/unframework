<?php declare(strict_types = 1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Twig_Environment;

class HomeController
{
    protected $twig;

    protected $response;

    public function __construct(Twig_Environment $twig, ResponseInterface $response)
    {
        $this->twig = $twig;
        $this->response = $response;
    }

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $tpl = $this->twig->load('index.html');
        $this->response->getBody()->write($tpl->render());
        return $this->response;
    }
}
