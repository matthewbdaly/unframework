<?php declare(strict_types = 1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggerProvider extends AbstractServiceProvider
{
    protected $provides = [
        'Psr\Log\LoggerInterface',
    ];

    public function register()
    {
        // Register items
        $this->getContainer()
             ->add('Psr\Log\LoggerInterface', function () {
                 $log = new Logger('app');
                 $log->pushHandler(new StreamHandler('../logs/site.log', Logger::WARNING));
                 return $log;
             });
    }
}
