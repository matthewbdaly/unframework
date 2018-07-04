<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use League\Container\Container;

define(BASE_DIR, getcwd());
$routes = include __DIR__.'/../routes.php';

$container = new Container;
$container->addServiceProvider('App\Providers\CacheProvider');
$container->addServiceProvider('App\Providers\EventProvider');
$container->addServiceProvider('App\Providers\LoggerProvider');
$container->addServiceProvider('App\Providers\TwigProvider');
$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);
$twig = $container->get('Twig_Environment');

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    ob_start();
    $logger = $container->get('Psr\Log\LoggerInterface');
    $logger->error('Testing');
    $template = $twig->load(sprintf('%s.html', $_route));
    $template->display();
    $response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();
