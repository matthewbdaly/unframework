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
        $this->getContainer()
            ->add('App\Contracts\Exceptions\Handler', function () {
            return new LogHandler($this->getContainer()->get('Psr\Log\LoggerInterface'));
        });
    }
}
