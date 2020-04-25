<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

final class FlysystemProvider extends AbstractServiceProvider
{
    protected $provides = [
        'League\Flysystem\Filesystem',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
            ->add('League\Flysystem\Filesystem', function () {
                $adapter = new Local(BASE_DIR . '/public/storage/');
                return new Filesystem($adapter);
            });
    }
}
