<?php declare(strict_types = 1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Route\RouteCollection;

class RouterProvider extends AbstractServiceProvider
{
    protected $provides = [
        'League\Route\RouteCollection',
    ];

    public function register()
    {
        // Register items
        $this->getContainer()
            ->add('League\Route\RouteCollection', function () {
                return new RouteCollection($this->getContainer());
            });
    }
}
