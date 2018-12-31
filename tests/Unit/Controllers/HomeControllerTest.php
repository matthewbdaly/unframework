<?php declare(strict_types = 1);

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Mockery as m;
use App\Controllers\HomeController;

class HomeControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $request = m::mock('Psr\Http\Message\ServerRequestInterface');
        $response = m::mock('Psr\Http\Message\ResponseInterface');
        $renderer = m::mock('App\Contracts\Renderer');
        $renderer->shouldReceive('render')->with($response, 'index.html', [])->once();
        $controller = new HomeController($response, $renderer);
        $controller->index($request);
    }
}
