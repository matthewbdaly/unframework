<?php declare(strict_types = 1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use App\Exceptions\LogHandler;

class HandlerProvider extends AbstractServiceProvider
{
    protected $provides = [
        'App\Contracts\Exceptions\Handler',
    ];

    public function register()
    {
        // Register items
        $container = $this->getContainer();
        $container->add('App\Contracts\Exceptions\Handler', function () use ($container) {
            return new LogHandler($container->get('Psr\Log\LoggerInterface'));
        });
    }
}
