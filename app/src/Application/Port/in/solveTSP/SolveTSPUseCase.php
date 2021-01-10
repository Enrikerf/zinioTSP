<?php


namespace App\Application\Port\in\solveTSP;

interface SolveTSPUseCase
{
    public function solve(): SolveTSPResponse;
}