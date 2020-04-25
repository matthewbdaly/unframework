<?php

declare(strict_types=1);

namespace App\Providers;

use Cache\Adapter\Doctrine\DoctrineCachePool;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Cache\CacheItemPoolInterface;
use Stash\Pool;
use Stash\Driver\FileSystem;
use Doctrine\Common\Cache\ArrayCache;

final class CacheProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Doctrine\Common\Cache\Cache',
        'Psr\Cache\CacheItemPoolInterface',
    ];

    public function register(): void
    {
        // Register items
        $container = $this->getContainer();
        $container->add('Doctrine\Common\Cache\Cache', function () {
            return new ArrayCache();
        });
        $container->add('Psr\Cache\CacheItemPoolInterface', function () use ($container) {
            return new DoctrineCachePool($container->get('Doctrine\Common\Cache\Cache'));
        });
    }
}
