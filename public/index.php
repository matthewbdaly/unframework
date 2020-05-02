<?php

declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$app = new App\Kernel();
$response = $app->bootstrap()
    ->handle($request);
$container = $app->getContainer();
$clockwork = $container->get('Clockwork\Support\Vanilla\Clockwork');
$clockwork->requestProcessed();

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
