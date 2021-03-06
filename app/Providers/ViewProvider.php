<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use App\Renderers\TwigRenderer;

final class ViewProvider extends AbstractServiceProvider
{
    protected $provides = [
        'App\Contracts\Renderer',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
             ->add('App\Contracts\Renderer', function () {
                 $twig = $this->getContainer()->get('Twig\Environment');
                 return new TwigRenderer($twig);
             });
    }
}
