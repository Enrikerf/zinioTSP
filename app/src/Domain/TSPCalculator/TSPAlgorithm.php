<?php


namespace App\Domain\TSPCalculator;


abstract class TSPAlgorithm
{
    public abstract function solve(array $TSPGraph):?array;
    public abstract function getErrors(): ?array;

}