<?php


namespace App\Domain\TSPCalculator;


class TSPCalculator
{
    private TSPAlgorithm $algorithm;

    /**
     * TSPCalculator constructor.
     * @param TSPAlgorithm $algorithm
     */
    public function __construct(TSPAlgorithm $algorithm)
    {
        $this->algorithm = $algorithm;
    }


    public function calculate(array $TSPGraph): ?array
    {
        return $this->algorithm->solve($TSPGraph);
    }

    public function getErrors(): ?array
    {
        return $this->algorithm->getErrors();
    }

}