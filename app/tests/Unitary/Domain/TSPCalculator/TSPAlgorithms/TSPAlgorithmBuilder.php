<?php


namespace App\Tests\Unitary\Domain\TSPCalculator\TSPAlgorithms;


use App\Domain\TSPCalculator\TSPAlgorithms\TSPEmptyAlgorithm;

class TSPAlgorithmBuilder
{

    public static function getTSPEmptyAlgorithm(): TSPEmptyAlgorithm
    {
        return new TSPEmptyAlgorithm();
    }
}