<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Psy\Shell;
use Psy\Configuration;

class ShellProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Psy\Shell',
    ];

    public function register(): void
    {
        // Register items
        $this->getContainer()
            ->add('Psy\Shell', function () {
                $config = new Configuration([
                    'updateCheck' => 'never'
                ]);
                return new Shell($config);
            });
    }
}
