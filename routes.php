<?php

$router->get('/', 'App\Controllers\HomeController::index')
    ->middleware(new App\Middleware\SetHeader);

$router->get('/login', 'App\Controllers\AuthController::show');
