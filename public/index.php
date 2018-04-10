<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use League\Container\Container;

$routes = include __DIR__.'/../routes.php';

$container = new Container;
$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);
$loader = new Twig_Loader_Filesystem(__DIR__.'/../app/views');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__.'/../cache/views',
));

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    ob_start();
    $template = $twig->load(sprintf('%s.html', $_route));
    $template->display();
    $response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();
