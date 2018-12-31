<?php declare(strict_types = 1);

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Mockery as m;
use App\Controllers\AuthController;

class AuthControllerTest extends TestCase
{
    public function testShow(): void
    {
        $request = m::mock('Psr\Http\Message\ServerRequestInterface');
        $response = m::mock('Psr\Http\Message\ResponseInterface');
        $renderer = m::mock('App\Contracts\Renderer');
        $renderer->shouldReceive('render')->with($response, 'login.html', [])->once();
        $controller = new AuthController($response, $renderer);
        $controller->show($request);
    }
}
