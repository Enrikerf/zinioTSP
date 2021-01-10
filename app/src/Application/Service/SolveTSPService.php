<?php


namespace App\Application\Service;


use App\Application\Model\Errors;
use App\Application\Model\ResponseCode;
use App\Application\Port\in\solveTSP\SolveTSPResponse;
use App\Application\Port\in\solveTSP\SolveTSPUseCase;
use App\Application\Port\out\Persistence\LoadCitiesPort;
use App\Domain\TSPCalculator\TSPAlgorithms\TSPEmptyAlgorithm;
use App\Domain\TSPCalculator\TSPCalculator;


class SolveTSPService implements SolveTSPUseCase
{
    private LoadCitiesPort $loadCitiesPort;

    public function __construct(LoadCitiesPort $loadCitiesPort)
    {
        $this->loadCitiesPort = $loadCitiesPort;
    }

    public function solve(): SolveTSPResponse
    {
        $calculator = (new TSPCalculator(new TSPEmptyAlgorithm()));
        if (($cities = $this->loadCitiesPort->getCities()) === null) {
            return new SolveTSPResponse(ResponseCode::NOT_OK, Errors::LOAD_CITIES_PORT_ERROR);
        }
        if (($tspResult = $calculator->calculate($cities)) === null) {
            return new SolveTSPResponse(ResponseCode::NOT_OK, $calculator->getErrors());
        }
        return new SolveTSPResponse(ResponseCode::OK, $tspResult);
    }
}