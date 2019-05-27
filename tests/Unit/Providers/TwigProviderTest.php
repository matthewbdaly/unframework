<?php declare(strict_types = 1);

namespace Tests\Unit\Providers;

use Tests\TestCase;

class TwigProviderTest extends TestCase
{
    public function testCreateTwig(): void
    {
        $emitter = $this->container->get('Twig\Environment');
        $this->assertInstanceOf('Twig\Environment', $emitter);
    }
}
