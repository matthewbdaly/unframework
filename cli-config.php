<?php declare(strict_types = 1);
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = $container->get('Doctrine\ORM\EntityManager');

return ConsoleRunner::createHelperSet($entityManager);
