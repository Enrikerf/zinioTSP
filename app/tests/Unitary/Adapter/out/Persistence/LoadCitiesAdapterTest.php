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
     * - filled Cities dataset - good format - multiword (contain one word case)
     * - filled Cities dataset - bad format  - multiword (contain one word case)
     * Limit Values
     * - filled dataset it is the same with one to N cities, de limit it is 1
     */

    public function testEmptyDatasetReturnNull()
    {
        $cityRepository = CityRepositoryBuilder::getMockBuilder()->setCitiesToReturnOnGetCities(null)->build();
        $loadCitiesAdapter = LoadCitiesAdapterBuilder::getBuilder()->citiesRepository($cityRepository)->build();
        $this->assertNull($loadCitiesAdapter->getCities());
    }

    public function testFilledDatasetWitBadFormatReturnNull()
    {
        $cityRepository = CityRepositoryBuilder::getMockBuilder()->setCitiesToReturnOnGetCities([
            CityRepositoryBuilder::NOT_VALID_MULTI_WORD_NAME_CITY_STRING
        ])->build();
        $loadCitiesAdapter = LoadCitiesAdapterBuilder::getBuilder()->citiesRepository($cityRepository)->build();
        $this->assertNull($loadCitiesAdapter->getCities());
    }

    public function testFilledDatasetWitGoodFormatReturnArray()
    {
        $cityRepository = CityRepositoryBuilder::getMockBuilder()->setCitiesToReturnOnGetCities([
            CityRepositoryBuilder::VALID_MULTI_WORD_NAME_CITY_STRING
        ])->build();
        $loadCitiesAdapter = LoadCitiesAdapterBuilder::getBuilder()->citiesRepository($cityRepository)->build();
        $this->assertIsArray($loadCitiesAdapter->getCities());
    }
}