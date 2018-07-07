<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;

class FlysystemProviderTest extends TestCase
{
    public function testCreateFlysystem()
    {
        $fs = $this->container->get('League\Flysystem\Filesystem');
        $this->assertInstanceOf('League\Flysystem\Filesystem', $fs);
    }
}