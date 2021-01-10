<?php


namespace App\Tests\Unitary\Domain\TSPCalculator;


use App\Domain\TSPCalculator\TSPAlgorithm;
use Mockery;
use PHPUnit\Framework\MockObject\MockBuilder;

class TSPAlgorithmBuilder
{

    public static function getMockWithDefaultSolveResult(){
        $TSPAlgorithmMock = Mockery::mock(TSPAlgorithm::class);
        $TSPAlgorithmMock->allows([
            "solve"=>[],
            "getErrors"=>null,
        ]);
        return $TSPAlgorithmMock;
    }

    public static function getMockWithSolveFailureResponse(){
        $TSPAlgorithmMock = Mockery::mock(TSPAlgorithm::class);
        $TSPAlgorithmMock->allows([
            "solve"=>null,
            "getErrors"=>[],
        ]);
        return $TSPAlgorithmMock;
    }

}