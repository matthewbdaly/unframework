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
        $this->markTestSkipped();
        $this->makeRequest('/login')
            ->assertStatusCode(200);
    }

    public function test404(): void
    {
        $this->makeRequest('/foo')
            ->assertStatusCode(404);
    }
}
