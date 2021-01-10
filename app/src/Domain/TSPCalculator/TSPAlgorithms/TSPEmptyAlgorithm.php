<?php


namespace App\Domain\TSPCalculator\TSPAlgorithms;


use App\Domain\TSPCalculator\TSPAlgorithm;

class TSPEmptyAlgorithm extends TSPAlgorithm
{

    public function solve(array $TSPGraph):array
    {
        return $TSPGraph;
    }

    public function getErrors(): ?array
    {
        return [];
    }
}