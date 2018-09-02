<?php declare(strict_types = 1);

namespace Tests\Integration;

use Tests\IntegrationTestCase;

class ExampleTest extends IntegrationTestCase
{
    public function testHome()
    {
        $this->makeRequest('/')
            ->assertStatusCode(200);
    }

    public function testLogin()
    {
        $this->makeRequest('/login')
            ->assertStatusCode(200);
    }
}
