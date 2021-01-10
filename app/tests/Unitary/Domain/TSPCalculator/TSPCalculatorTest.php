<?php


namespace App\Tests\Unitary\Domain\TSPCalculator;


use App\Domain\TSPCalculator\TSPCalculator;
use App\Tests\Unitary\Domain\TSPCalculator\TSPAlgorithms\TSPGraphBuilder;
use PHPUnit\Framework\TestCase;

class TSPCalculatorTest extends TestCase
{
    public function testOnCalculateFailureReturnNull(){
        $calculator = new TSPCalculator(TSPAlgorithmBuilder::getMockWithSolveFailureResponse());
        $this->assertNull($calculator->calculate(TSPGraphBuilder::getDefaultGraph()));
    }
    public function testOnCalculateSuccessReturnArrayWithResultedGraph(){

    }

    public function testOnCalculateFailureGetErrorsReturnArrayWithErrors(){

    }
}