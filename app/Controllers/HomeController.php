<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Contracts\Renderer;

final class HomeController
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @var Renderer
     */
    private $view;

    public function __construct(ResponseInterface $response, Renderer $view)
    {
        $this->response = $response;
        $this->view = $view;
    }

    public function index(ServerRequestInterface $request): ResponseInterface
    {
        return $this->view->render($this->response, 'index.html', []);
    }
}
