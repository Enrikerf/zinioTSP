<?php

namespace App\Adapter\in\Command;

use App\Application\Model\ResponseCode;
use App\Application\Port\in\solveTSP\SolveTSPResponse;
use App\Application\Port\in\solveTSP\SolveTSPUseCase;
use App\Tests\Unitary\Domain\City\City;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Solve extends Command
{
    const ERROR_MESSAGE = "ERROR: \n";
    private SolveTSPUseCase $solveTSPUseCase;

    public function __construct(SolveTSPUseCase $solveTSPUseCase)
    {
        parent::__construct();
        $this->solveTSPUseCase = $solveTSPUseCase;
    }

    protected function configure()
    {
        $this
            ->setDescription('Solve TSP graph');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $response = $this->solveTSPUseCase->solve();
        $this->printResult($response, $output);

        return 0;
    }

    private function printResult(SolveTSPResponse $applicationResponse, OutputInterface $output): void
    {
        if ($applicationResponse->getResponseCode() !== ResponseCode::OK) {
            $output->write(self::ERROR_MESSAGE . json_encode($applicationResponse->getMessage()));
        } else {
            /** @var City $city */
            foreach ($applicationResponse->getMessage() as $city) {
                $output->writeln($city->getName());
            }

        }

    }
}