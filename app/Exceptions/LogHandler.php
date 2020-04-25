<?php

declare(strict_types=1);

namespace App\Exceptions;

use Psr\Log\LoggerInterface;
use Throwable;
use Whoops\Exception\Inspector;
use Whoops\RunInterface;
use App\Contracts\Exceptions\Handler;

class LogHandler implements Handler
{
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(Throwable $exception, Inspector $inspector, RunInterface $run): void
    {
        $this->logger->error($exception->getMessage(), $exception->getTrace());
    }
}
