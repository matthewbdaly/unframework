<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Route\Router;

class RouterProvider extends AbstractServiceProvider
{
    protected $provides = [
        'League\Route\Router',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
            ->add('League\Route\Router', function () {
                return new Router();
            });
    }
}
