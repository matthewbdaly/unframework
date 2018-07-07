<?php

require_once __DIR__.'/../bootstrap.php';

$container->share('response', Zend\Diactoros\Response::class);
$container->share('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);
try {
    $response = $router->dispatch($container->get('request'), $container->get('response'));
} catch (\League\Route\Http\Exception\NotFoundException $e) {
    $twig = $container->get('Twig_Environment');
    $tpl = $twig->load('404.html');
    $response = $container->get('response');
    $response->getBody()->write($tpl->render());
}

$container->get('emitter')->emit($response);
