<?php declare(strict_types = 1);

require_once __DIR__.'/../vendor/autoload.php';

if (!defined('BASE_DIR')) {
    define('BASE_DIR', __DIR__.'/../');
}

$dotenv = new Dotenv\Dotenv(BASE_DIR);
$dotenv->load();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
 
$app = new App\Kernel;
$response = $app->bootstrap()
    ->handle($request);
$app->getContainer()->get('emitter')->emit($response);
