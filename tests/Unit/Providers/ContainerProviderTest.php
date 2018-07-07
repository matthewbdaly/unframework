<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;

class ContainerProviderTest extends TestCase
{
    public function testCreateContainer()
    {
        $container = $this->container->get('League\Container\ContainerInterface');
        $this->assertInstanceOf('League\Container\Container', $container);
    }
}
