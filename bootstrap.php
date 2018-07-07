<?php

require_once __DIR__.'/vendor/autoload.php';

use League\Container\Container;
use League\Container\ReflectionContainer;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

if (!defined('BASE_DIR')) {
    define('BASE_DIR', __DIR__);
}

$container = new Container;
$container->delegate(
    new ReflectionContainer
);
$container->addServiceProvider('App\Providers\ContainerProvider');
$container->addServiceProvider('App\Providers\CacheProvider');
$container->addServiceProvider('App\Providers\DoctrineProvider');
$container->addServiceProvider('App\Providers\EventProvider');
$container->addServiceProvider('App\Providers\FlysystemProvider');
$container->addServiceProvider('App\Providers\LoggerProvider');
$container->addServiceProvider('App\Providers\SessionProvider');
$container->addServiceProvider('App\Providers\ShellProvider');
$container->addServiceProvider('App\Providers\TwigProvider');

$router = new League\Route\RouteCollection($container);

require_once 'routes.php';
