<?php declare(strict_types = 1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\Container;

class ContainerProvider extends AbstractServiceProvider
{
    protected $provides = [
        'League\Container\ContainerInterface',
    ];

    public function register()
    {
        // Register items
        $this->getContainer()
             ->add('League\Container\ContainerInterface', function () {
                 return $this->getContainer();
             });
    }
}
