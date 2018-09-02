<?php declare(strict_types = 1);

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Mockery as m;
use App\Controllers\AuthController;

class AuthControllerTest extends TestCase
{
    public function testShow(): void
    {
        $renderer = m::mock(new \stdClass);
        $renderer->shouldReceive('render')->once();
        $twig = m::mock('Twig_Environment');
        $twig->shouldReceive('load')->with('login.html')->once()->andReturn($renderer);
        $request = m::mock('Psr\Http\Message\ServerRequestInterface');
        $response = m::mock('Psr\Http\Message\ResponseInterface');
        $response->shouldReceive('getBody->write')->once();
        $controller = new AuthController($twig);
        $controller->show($request, $response);
    }
}
