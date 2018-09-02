<?php declare(strict_types = 1);

namespace Tests\Integration;

use Tests\IntegrationTestCase;

class ExampleTest extends IntegrationTestCase
{
    public function testHome(): void
    {
        $this->makeRequest('/')
            ->assertStatusCode(200);
    }

    public function testLogin(): void
    {
        $this->makeRequest('/login')
            ->assertStatusCode(200);
    }
}
