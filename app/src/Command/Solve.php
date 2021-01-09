<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Solve extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Solve TSP graph');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->write("hi\n");
        return 0;
    }
}