<?php


namespace App\Tests\Unitary\Domain\TSPCalculator;


use App\Domain\TSPCalculator\TSPCalculator;
use App\Tests\Unitary\Domain\TSPCalculator\TSPAlgorithms\TSPGraphBuilder;
use PHPUnit\Framework\TestCase;

class TSPCalculatorTest extends TestCase
{
    public function testOnCalculateFailureReturnNullAndGetErrorsAnArray(){
        $calculator = new TSPCalculator(TSPAlgorithmBuilder::getMockWithSolveFailureResponse());
        $this->assertNull($calculator->calculate(TSPGraphBuilder::getDefaultGraph()));
        $this->assertIsArray($calculator->getErrors());
    }
    public function testOnCalculateSuccessReturnArrayWithResultedGraphAndGetErrorsNull(){
        $calculator = new TSPCalculator(TSPAlgorithmBuilder::getMockWithDefaultSolveResult());
        $this->assertIsArray($calculator->calculate(TSPGraphBuilder::getDefaultGraph()));
        $this->assertNull($calculator->getErrors());
    }

}