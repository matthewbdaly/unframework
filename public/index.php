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
$app->getContainer()->get('emitter')->emit($response);
