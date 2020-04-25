<?php

declare(strict_types=1);

namespace Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use MockeryPHPUnitIntegration;

    public function setUp(): void
    {
        if (!defined('ROOT_DIR')) {
            define('ROOT_DIR', __DIR__ . '/../');
        }
        $this->app = new \App\Kernel();
        $this->app->bootstrap();
        $this->container = $this->app->getContainer();
    }

    public function tearDown(): void
    {
        $this->app = null;
        $this->container = null;
    }
}
