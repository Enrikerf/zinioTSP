<?php


namespace App\Tests\Unitary\Adapter\out\Persistence;


use PHPUnit\Framework\TestCase;

class LoadCitiesAdapterTest extends TestCase
{

    /**
     *  Get Cities
     *
     * Factors:
     * - cities with single/multi-word Name
     * - cities without right format: at least 3 elements separates by spaces ended by \r\n
     * Equivalence classes:
     * - empty Cities dataset
     * - filled Cities dataset - good format
     * - filled Cities dataset - bad format
     * Limit Values
     * - filled dataset it is the same with one to N cities, de limit it is 1
     */

    public function testEmptyDatasetReturnNull()
    {
        $cityRepository = CityRepositoryBuilder::getMockBuilder()->setCitiesToREturnOnGetCities(null)->build();
        $loadCitiesAdapter = LoadCitiesAdapterBuilder::getBuilder()->citiesRepository($cityRepository)->build();
        $this->assertNull($loadCitiesAdapter->getCities());
    }

    public function testFilledDatasetWitBadFormatReturnNull()
    {
        $cityRepository = CityRepositoryBuilder::getMockBuilder()->setCitiesToREturnOnGetCities([
            CityRepositoryBuilder::NOT_VALID_ONE_WORD_NAME_CITY_STRING
        ])->build();
        $loadCitiesAdapter = LoadCitiesAdapterBuilder::getBuilder()->citiesRepository($cityRepository)->build();
        $this->assertNull($loadCitiesAdapter->getCities());
    }

    public function testFilledDatasetWitGoodFormatReturnArray()
    {
        $cityRepository = CityRepositoryBuilder::getMockBuilder()->setCitiesToREturnOnGetCities([
            CityRepositoryBuilder::VALID_ONE_WORD_NAME_CITY_STRING
        ])->build();
        $loadCitiesAdapter = LoadCitiesAdapterBuilder::getBuilder()->citiesRepository($cityRepository)->build();
        $this->assertIsArray($loadCitiesAdapter->getCities());
    }
}