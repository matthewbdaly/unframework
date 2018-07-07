<?php

namespace Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use MockeryPHPUnitIntegration;

    public function setUp()
    {
        require __DIR__.'/../bootstrap.php';
        $this->container = $container;
    }
}
