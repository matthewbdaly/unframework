<?php declare(strict_types = 1);

namespace App;

use Zend\Diactoros\ServerRequestFactory;
use League\Container\Container;
use League\Container\ReflectionContainer;
use Psr\Http\Message\RequestInterface;

class Kernel
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var Router
     */
    private $router;

    /**
     * Bootstrap the application
     *
     * @return Kernel
     */
    public function bootstrap()
    {
        $this->setupContainer();
        $this->setupRoutes();
        $this->setErrorHandler();
        return $this;
    }

    /**
     * Handle a request
     *
     * @param RequestInterface $request HTTP request.
     * @return void
     */
    public function handle(RequestInterface $request)
    {
        try {
            $response = $this->router->dispatch($request, $this->container->get('response'));
        } catch (\League\Route\Http\Exception\NotFoundException $e) {
            $twig = $this->container->get('Twig_Environment');
            $tpl = $twig->load('404.html');
            $response = $this->container->get('response');
            $response->getBody()->write($tpl->render());
        }
        return $response;
    }

    private function setupContainer()
    {
        $container = new Container;
        $container->delegate(
            new ReflectionContainer
        );

        $container->addServiceProvider('App\Providers\ContainerProvider');
        $container->addServiceProvider('App\Providers\CacheProvider');
        $container->addServiceProvider('App\Providers\DoctrineProvider');
        $container->addServiceProvider('App\Providers\EventProvider');
        $container->addServiceProvider('App\Providers\FlysystemProvider');
        $container->addServiceProvider('App\Providers\HandlerProvider');
        $container->addServiceProvider('App\Providers\LoggerProvider');
        $container->addServiceProvider('App\Providers\RouterProvider');
        $container->addServiceProvider('App\Providers\SessionProvider');
        $container->addServiceProvider('App\Providers\ShellProvider');
        $container->addServiceProvider('App\Providers\TwigProvider');
        $container->share('emitter', \Zend\Diactoros\Response\SapiEmitter::class);
        $container->share('response', \Zend\Diactoros\Response::class);
        $this->container = $container;
    }

    private function setErrorHandler()
    {
        error_reporting(E_ALL);
        $environment = getenv('APP_ENV');

        $whoops = new \Whoops\Run;
        if ($environment !== 'production') {
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        } else {
            $handler = $this->container->get('App\Contracts\Exceptions\Handler');
            $whoops->pushHandler(new \Whoops\Handler\CallbackHandler($handler));
        }
        $whoops->register();
    }

    private function setupRoutes()
    {
        $router = $this->container->get('League\Route\RouteCollection');
        require_once BASE_DIR.'/routes.php';
        $this->router = $router;
    }

    public function getContainer()
    {
        return $this->container;
    }
}