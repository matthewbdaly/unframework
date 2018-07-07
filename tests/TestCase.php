<?php

namespace Tests;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        require __DIR__.'/../bootstrap.php';
        $this->container = $container;
    }
}
