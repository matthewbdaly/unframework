<?php declare(strict_types = 1);

namespace Tests;

use Zend\Diactoros\Request;

class IntegrationTestCase extends TestCase
{
    public function makeRequest(string $uri, string $method = 'GET')
    {
        $request = new Request($uri, $method);
        $this->response = $this->app->handle($request);
        return $this;
    }
}
