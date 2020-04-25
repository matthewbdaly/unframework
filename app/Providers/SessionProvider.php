<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Symfony\Component\HttpFoundation\Session\Session;

final class SessionProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Symfony\Component\HttpFoundation\Session\SessionInterface',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
             ->add('Symfony\Component\HttpFoundation\Session\SessionInterface', function () {
                 return new Session();
             });
    }
}
