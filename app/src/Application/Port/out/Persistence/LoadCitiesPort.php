<?php


namespace App\Application\Port\out\Persistence;


interface LoadCitiesPort
{

    public function getCities():?array;
}