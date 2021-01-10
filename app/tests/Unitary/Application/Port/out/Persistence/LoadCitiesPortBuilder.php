<?php


namespace App\Tests\Unitary\Application\Port\out\Persistence;


use App\Application\Port\out\Persistence\LoadCitiesPort;

class LoadCitiesPortBuilder
{
    public static function getMockWithReturnDefaultCities(){
        $loadCitiesPortMock = \Mockery::mock(LoadCitiesPort::class);
        $loadCitiesPortMock->allows([
            "getCities"=>[]
        ]);
        return $loadCitiesPortMock;
    }
    public static function getMockWithReturnNull(){
        $loadCitiesPortMock = \Mockery::mock(LoadCitiesPort::class);
        $loadCitiesPortMock->allows([
            "getCities"=>null
        ]);
        return $loadCitiesPortMock;
    }

}