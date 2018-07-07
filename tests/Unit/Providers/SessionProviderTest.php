<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;

class SessionProviderTest extends TestCase
{
    public function testCreateSession()
    {
        $session = $this->container->get('Symfony\Component\HttpFoundation\Session\SessionInterface');
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Session\Session', $session);
    }
}
