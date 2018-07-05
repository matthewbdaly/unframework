<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Doctrine\ORM\EntityManager',
    ];

    public function register()
    {
        // Register items
        $this->getContainer()
             ->add('Doctrine\ORM\EntityManager', function () {
                 $paths = ['app/Doctrine/Entities'];
                 $isDevMode = false;
                 $dbParams = array(
                     'driver' => getenv('DB_TYPE', 'pdo_sqlite'),
                     'path' => getenv('DB_PATH'),
                 );
                 $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
                 return EntityManager::create($dbParams, $config);
             });
    }
}