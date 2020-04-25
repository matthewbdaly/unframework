<?php

declare(strict_types=1);

$router->get('/__clockwork/{request:.+}', 'App\Controllers\ClockworkController::process');
$router->get('/', 'App\Controllers\HomeController::index')
       ->middleware(new App\Middleware\SetHeader());

$router->get('/login', 'App\Controllers\AuthController::show');
