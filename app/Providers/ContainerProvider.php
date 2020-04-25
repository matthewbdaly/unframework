<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\Container;

final class ContainerProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Psr\Container\ContainerInterface',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
             ->add('Psr\Container\ContainerInterface', function () {
                 return $this->getContainer();
             });
    }
}
