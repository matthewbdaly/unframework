<?php declare(strict_types = 1);

namespace Tests\Unit\Providers;

use Tests\TestCase;

class RouterProviderTest extends TestCase
{
    public function testCreateFlysystem()
    {
        $router = $this->container->get('League\Route\RouteCollection');
        $this->assertInstanceOf('League\Route\RouteCollection', $router);
    }
}
