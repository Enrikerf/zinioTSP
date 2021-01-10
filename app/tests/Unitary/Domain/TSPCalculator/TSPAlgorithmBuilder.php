<?php


namespace App\Tests\Unitary\Domain\TSPCalculator;


use App\Domain\TSPCalculator\TSPAlgorithm;
use Mockery;
use PHPUnit\Framework\MockObject\MockBuilder;

class TSPAlgorithmBuilder
{

    public static function getMockWithDefaultSolveResult(){
        $TSPAlgorithm = Mockery::mock(TSPAlgorithm::class);
        $TSPAlgorithm->allows([
            "solve"=>[],
            "getErrors"=>null,
        ]);
        return $TSPAlgorithm;
    }

    public static function getMockWithSolveFailureResponse(){
        $TSPAlgorithm = Mockery::mock(TSPAlgorithm::class);
        $TSPAlgorithm->allows([
            "solve"=>null,
            "getErrors"=>[],
        ]);
        return $TSPAlgorithm;
    }

}