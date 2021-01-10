<?php


namespace App\Tests\Unitary\Adapter\out\Persistence;


use App\Adapter\out\Persistence\CityRepository;
use Mockery;

class CityRepositoryBuilder
{
    const NOT_VALID_MULTI_WORD_NAME_CITY_STRING = " Beijing Beijing 39.93 ";
    const VALID_MULTI_WORD_NAME_CITY_STRING = " Beijing Beijing  39.93 116.40";

    private ?array $citiesToReturnOnGetCities;

    public static function getMockBuilder(): CityRepositoryBuilder
    {
        return new CityRepositoryBuilder();
    }

    public function setCitiesToReturnOnGetCities(?array $cities): CityRepositoryBuilder
    {
        $this->citiesToReturnOnGetCities = $cities;
        return $this;
    }

    public function build()
    {
        $cityRepositoryMock = Mockery::mock(CityRepository::class);
        $cityRepositoryMock->allows([
            "getCities" => $this->citiesToReturnOnGetCities
        ]);
        return $cityRepositoryMock;
    }



}