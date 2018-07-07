<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;

class CacheProviderTest extends TestCase
{
    public function testCreateContainer()
    {
        $container = $this->container->get('Psr\Cache\CacheItemPoolInterface');
        $this->assertInstanceOf('Stash\Pool', $container);
    }
}
