<?php

namespace Tests\Unit\Console;

use Tests\TestCase;
use App\Console\Shell;
use Mockery as m;
use Symfony\Component\Console\Tester\CommandTester;

class ShellTest extends TestCase
{
    public function testCreateShell()
    {
        $shell = m::mock('Psy\Shell');
        $shell->shouldReceive('run')->once();
        $this->container->add('Psy\Shell', $shell);
        $cmd = $this->container->get('App\Console\Shell');
        $tester = new CommandTester($cmd);
        $tester->execute([]);
    }
}
