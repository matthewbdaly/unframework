<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Psy\Shell;

class ShellProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Psy\Shell',
    ];

    public function register()
    {
        // Register items
        $this->getContainer()
            ->add('Psy\Shell', function () {
                $config = new Configuration([
                    'updateCheck' => 'never'
                ]);
                return new Psysh($config);
            });
    }
}
