<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Contracts\Renderer;

class AuthController
{
    protected $response;

    protected $view;

    public function __construct(ResponseInterface $response, Renderer $view)
    {
        $this->response = $response;
        $this->view = $view;
    }

    public function show(ServerRequestInterface $request): ResponseInterface
    {
        return $this->view->render($this->response, 'login.html', []);
    }
}
