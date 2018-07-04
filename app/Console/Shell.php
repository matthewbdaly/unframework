<?php

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Psy\Shell as Psysh;
use Psy\Configuration;

class Shell extends Command
{
    protected function configure()
    {
        $this->setName('shell')
             ->setDescription('Runs an interactive shell')
             ->setHelp('This command runs an interactive shell');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config = new Configuration([
            'updateCheck' => 'never'
        ]);

        $shell = new Psysh($config);
        $shell->run();
    } 
}
