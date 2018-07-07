<?php

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use League\Container\ContainerInterface;
use Psy\Shell as Psysh;
use Psy\Configuration;

class Shell extends Command
{
    protected $container;
    
    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }
    
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
        $container = $this->container;

        $shell = new Psysh($config);
        $shell->run();
    } 
}
