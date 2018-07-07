<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;

class EventProviderTest extends TestCase
{
    public function testCreateEventEmitter()
    {
        $emitter = $this->container->get('League\Event\EmitterInterface');
        $this->assertInstanceOf('League\Event\Emitter', $emitter);
    }
}