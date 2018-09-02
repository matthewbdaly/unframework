<?php declare(strict_types = 1);

namespace Tests\Unit\Providers;

use Tests\TestCase;

class ContainerProviderTest extends TestCase
{
    public function testCreateContainer(): void
    {
        $container = $this->container->get('League\Container\ContainerInterface');
        $this->assertInstanceOf('League\Container\ContainerInterface', $container);
        $this->assertInstanceOf('League\Container\Container', $container);
    }
}
