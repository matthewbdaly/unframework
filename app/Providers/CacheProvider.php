<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Stash\Pool;
use Stash\Driver\FileSystem;

class CacheProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Psr\Cache\CacheItemPoolInterface',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
             ->add('Psr\Cache\CacheItemPoolInterface', function () {
                 $driver = new FileSystem();
                 $pool = new Pool($driver);
                 return $pool;
             });
    }
}
