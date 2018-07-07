<?php declare(strict_types = 1);

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use Mockery as m;
use App\Controllers\HomeController;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $renderer = m::mock(new \stdClass);
        $renderer->shouldReceive('render')->once();
        $twig = m::mock('Twig_Environment');
        $twig->shouldReceive('load')->with('index.html')->once()->andReturn($renderer);
        $request = m::mock('Psr\Http\Message\ServerRequestInterface');
        $response = m::mock('Psr\Http\Message\ResponseInterface');
        $response->shouldReceive('getBody->write')->once();
        $controller = new HomeController($twig);
        $controller->index($request, $response);
    }
}
