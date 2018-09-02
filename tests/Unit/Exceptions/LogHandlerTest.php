<?php declare(strict_types = 1);

namespace Tests\Unit\Exceptions;

use Tests\TestCase;
use Mockery as m;
use App\Exceptions\LogHandler;

class LogHandlerTest extends TestCase
{
    public function testHandle(): void
    {
        $logger = m::mock('Psr\Log\LoggerInterface');
        $logger->shouldReceive('error')->once();
        $exception = new \Exception;
        $inspector = m::mock('Whoops\Exception\Inspector');
        $run = m::mock('Whoops\RunInterface');
        $handler = new LogHandler($logger);
        $handler($exception, $inspector, $run);
    }
}
