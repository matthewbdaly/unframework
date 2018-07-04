<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\Container;

class ContainerProvider extends AbstractServiceProvider
{
    protected $provides = [
        'League\Container\Container',
    ];

    public function register()
    {
        // Register items
        $this->getContainer()
             ->add('League\Container\Container', function () {
                 return $this->getContainer();
             });
    }
}
