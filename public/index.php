<?php

require_once __DIR__.'/../bootstrap.php';

$container->share('response', Zend\Diactoros\Response::class);
$container->share('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);
$response = $router->dispatch($container->get('request'), $container->get('response'));

$container->get('emitter')->emit($response);
