<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;

class LoggerProviderTest extends TestCase
{
    public function testCreateEventEmitter()
    {
        $logger = $this->container->get('Psr\Log\LoggerInterface');
        $this->assertInstanceOf('Monolog\Logger', $logger);
    }
}
