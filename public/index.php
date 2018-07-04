<?php

require_once __DIR__.'/../vendor/autoload.php';

use League\Container\Container;

define('BASE_DIR', getcwd());

$container = new Container;
$container->addServiceProvider('App\Providers\CacheProvider');
$container->addServiceProvider('App\Providers\EventProvider');
$container->addServiceProvider('App\Providers\LoggerProvider');
$container->addServiceProvider('App\Providers\TwigProvider');

$container->share('response', Zend\Diactoros\Response::class);
$container->share('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);

$route = new League\Route\RouteCollection($container);

$route->map('GET', '/', 'App\Controllers\HomeController::index');

$response = $route->dispatch($container->get('request'), $container->get('response'));

$container->get('emitter')->emit($response);
