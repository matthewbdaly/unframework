<?php declare(strict_types = 1);

namespace Tests\Unit\Middleware;

use Tests\TestCase;
use Mockery as m;
use App\Middleware\SetHeader;

class SetHeaderTest extends TestCase
{
    public function testSetHeader(): void
    {
        $request = m::mock('Psr\Http\Message\ServerRequestInterface');
        $response = m::mock('Psr\Http\Message\ResponseInterface');
        $response->shouldReceive('withHeader')
            ->with('X-TEST', 'Testing')
            ->once()
            ->andReturn($response);
        $middleware = new SetHeader;
        $middleware($request, $response, function () use ($response) {
            return $response;
        });
    }
}
