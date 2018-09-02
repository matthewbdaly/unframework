<?php declare(strict_types = 1);
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Kernel;

if (!defined('BASE_DIR')) {
    define('BASE_DIR', __DIR__);
}
$dotenv = new Dotenv\Dotenv(BASE_DIR);
$dotenv->load();

$app = (new Kernel)->bootstrap();

// replace with mechanism to retrieve EntityManager in your app
$entityManager = $app->getContainer()->get('Doctrine\ORM\EntityManager');

return ConsoleRunner::createHelperSet($entityManager);
