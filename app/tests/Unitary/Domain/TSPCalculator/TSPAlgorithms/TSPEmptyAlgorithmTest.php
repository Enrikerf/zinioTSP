<?php


namespace App\Tests\Unitary\Domain\TSPCalculator\TSPAlgorithms;


use PHPUnit\Framework\TestCase;

class TSPEmptyAlgorithmTest extends TestCase
{

    public function testExecutionTimeShouldByLessThan15MinWith32Cities(){
        $startTime = microtime(true);
        (TSPAlgorithmBuilder::getTSPAlgorithm())->solve(TSPGraphBuilder::getDefaultGraph());
        $this->assertLessThanOrEqual(15,microtime(true)-$startTime,"execution time should be less than 15 min.");
    }

    public function testCitiesVisitedOnlyOneTime(){
        $this->markTestSkipped();
    }

    public function testAllCitiesHaveBeenVisited(){
        $this->markTestSkipped();
    }

    public function testResultedDistanceIsLessThanMaximum(){
        $this->markTestSkipped();
    }
}