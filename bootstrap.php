<?php

require_once __DIR__.'/vendor/autoload.php';

use League\Container\Container;
use League\Container\ReflectionContainer;

define('BASE_DIR', getcwd());

$container = new Container;
$container->delegate(
    new ReflectionContainer
);
$container->addServiceProvider('App\Providers\CacheProvider');
$container->addServiceProvider('App\Providers\EventProvider');
$container->addServiceProvider('App\Providers\LoggerProvider');
$container->addServiceProvider('App\Providers\TwigProvider');
