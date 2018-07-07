<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;

class TwigProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Twig_Environment',
    ];

    public function register()
    {
        // Register items
        $this->getContainer()
             ->add('Twig_Environment', function () {
                 $loader = new \Twig_Loader_Filesystem(BASE_DIR.'/app/views');
                 $twig = new \Twig_Environment($loader, array(
                     'cache' => BASE_DIR.'/../cache/views',
                 ));
                 return $twig;
             });
    }
}
