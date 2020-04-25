<?php

declare(strict_types=1);

namespace Tests\Unit\Providers;

use Tests\TestCase;

class HandlerProviderTest extends TestCase
{
    public function testCreateHandler(): void
    {
        $handler = $this->container->get('App\Contracts\Exceptions\Handler');
        $this->assertInstanceOf('App\Contracts\Exceptions\Handler', $handler);
        $this->assertInstanceOf('App\Exceptions\LogHandler', $handler);
    }
}
