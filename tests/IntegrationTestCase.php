<?php declare(strict_types = 1);

namespace Tests;

use Zend\Diactoros\ServerRequest;

class IntegrationTestCase extends TestCase
{
    public function makeRequest(string $uri, string $method = 'GET')
    {
        $request = new ServerRequest([], [], $uri, $method);
        $this->response = $this->app->handle($request);
        return $this;
    }

    public function assertStatusCode(int $code, $message = '')
    {
        if (!isset($this->response)) {
            throw new \Exception('No response has been received');
        }
        self::assertThat($this->response->getStatusCode() == $code, self::isTrue(), $message);
    }
}
