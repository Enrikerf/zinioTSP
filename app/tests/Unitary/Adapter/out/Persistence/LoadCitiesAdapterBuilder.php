<?php


namespace App\Tests\Unitary\Adapter\out\Persistence;


use App\Adapter\out\Persistence\CityRepository;
use App\Adapter\out\Persistence\LoadCitiesAdapter;

class LoadCitiesAdapterBuilder
{

    /**
     * @var CityRepository
     */
    private CityRepository $citiesRepository;

    public static function getBuilder(): LoadCitiesAdapterBuilder
    {
        return new LoadCitiesAdapterBuilder();
    }

    public function citiesRepository(CityRepository $cityRepository): LoadCitiesAdapterBuilder
    {
        $this->citiesRepository = $cityRepository;
        return $this;
    }

    public function build(): LoadCitiesAdapter
    {
        return new LoadCitiesAdapter($this->citiesRepository);
    }
}