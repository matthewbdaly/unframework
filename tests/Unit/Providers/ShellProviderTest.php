<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;

class ShellProviderTest extends TestCase
{
    public function testCreateShell()
    {
        $shell = $this->container->get('Psy\Shell');
        $this->assertInstanceOf('Psy\Shell', $shell);
    }
}