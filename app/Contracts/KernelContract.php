<?php

namespace App\Contracts;

use Psr\Http\Message\ResponseInterface;
use League\Container\Container;
use Psr\Http\Message\RequestInterface;

interface KernelContract
{
    /**
     * Bootstrap the application
     *
     */
    public function bootstrap(): KernelContract;

    /**
     * Handle a request
     *
     */
    public function handle(RequestInterface $request): ResponseInterface;

    public function getContainer(): Container;
}
