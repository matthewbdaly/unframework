<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class TwigProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Twig\Environment',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
             ->add('Twig\Environment', function () {
                 $loader = new FilesystemLoader(ROOT_DIR . '/app/views');
                 $twig = new Environment($loader, array(
                     'cache' => ROOT_DIR . '/cache/views',
                 ));
                 return $twig;
             });
    }
}
