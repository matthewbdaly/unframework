<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Event\Emitter;

final class EventProvider extends AbstractServiceProvider
{
    protected $provides = [
        'League\Event\EmitterInterface',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
            ->share('League\Event\EmitterInterface', function () {
                return new Emitter();
            });
    }
}
