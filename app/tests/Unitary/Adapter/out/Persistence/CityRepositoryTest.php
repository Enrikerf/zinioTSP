<?php


namespace App\Tests\Unitary\Adapter\out\Persistence;


use App\Adapter\out\Persistence\CityRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class CityRepositoryTest extends TestCase
{

    /**
     * Factors:
     *  - loadFile true/false
     *  - closeFile true/false
     *  - file Lines 0/or have it
     * Equivalence Classes:
     *  - file has 0 line - loadFile true   - closeFile true
     *  - file has 0 line - loadFile true   - closeFile false
     *  - file has 0 line - loadFile false  - closeFile true
     *  - file has 0 line - loadFile false  - closeFile false
     *
     *  - file has lines  - loadFile true   - closeFile false
     *  - file has lines  - loadFile true   - closeFile false
     *  - file has lines  - loadFile false  - closeFile false
     *  - file has lines  - loadFile false  - closeFile false
     * Limit values
     *  - file has 1 line or have N don't change result limit are in 1 line
     */
    public function testGetCitiesOnEmptyFileCanLoadFileCanCloseFileReturnNull()
    {
        $cityRepository = Mockery::mock(CityRepository::class)->makePartial();
        $cityRepository->shouldReceive('getLine')->andReturn(false);
        $cityRepository->shouldReceive('loadFile')->andReturn(true);
        $cityRepository->shouldReceive('closeFile')->andReturn(true);
        /** @var CityRepository $cityRepository */
        $this->assertNull($cityRepository->getCities());
    }

    public function testGetCitiesOnEmptyFileCanLoadFileCantCloseFileReturnNull()
    {
        $cityRepository = Mockery::mock(CityRepository::class)->makePartial();
        $cityRepository->shouldReceive('getLine')->andReturn(false);
        $cityRepository->shouldReceive('loadFile')->andReturn(true);
        $cityRepository->shouldReceive('closeFile')->andReturn(false);
        /** @var CityRepository $cityRepository */
        $this->assertNull($cityRepository->getCities());
    }

    public function testGetCitiesOnEmptyFileCantLoadFileCanCloseFileReturnNull()
    {
        $cityRepository = Mockery::mock(CityRepository::class)->makePartial();
        $cityRepository->shouldReceive('getLine')->andReturn(false);
        $cityRepository->shouldReceive('loadFile')->andReturn(false);
        $cityRepository->shouldReceive('closeFile')->andReturn(true);
        /** @var CityRepository $cityRepository */
        $this->assertNull($cityRepository->getCities());
    }

    public function testGetCitiesOnEmptyFileCantLoadFileCantCloseFileReturnNull()
    {
        $cityRepository = Mockery::mock(CityRepository::class)->makePartial();
        $cityRepository->shouldReceive('getLine')->andReturn(false);
        $cityRepository->shouldReceive('loadFile')->andReturn(false);
        $cityRepository->shouldReceive('closeFile')->andReturn(false);
        /** @var CityRepository $cityRepository */
        $this->assertNull($cityRepository->getCities());
    }

    public function testGetCitiesOnNotEmptyFileCanLoadFileCanCloseFileReturnArray()
    {
        $cityRepository = Mockery::mock(CityRepository::class)->makePartial();
        $cityRepository->shouldReceive('getLine')->andReturn(CityRepositoryBuilder::VALID_CITY_STRING, false);
        $cityRepository->shouldReceive('loadFile')->andReturn(true);
        $cityRepository->shouldReceive('closeFile')->andReturn(true);
        /** @var CityRepository $cityRepository */
        $this->assertIsArray($cityRepository->getCities());
    }

    public function testGetCitiesOnNotEmptyFileCanLoadFileCantCloseFileReturnNull()
    {
        $cityRepository = Mockery::mock(CityRepository::class)->makePartial();
        $cityRepository->shouldReceive('getLine')->andReturn(CityRepositoryBuilder::VALID_CITY_STRING, false);
        $cityRepository->shouldReceive('loadFile')->andReturn(true);
        $cityRepository->shouldReceive('closeFile')->andReturn(false);
        /** @var CityRepository $cityRepository */
        $this->assertNull($cityRepository->getCities());
    }

    public function testGetCitiesOnNotEmptyFileCantLoadFileCanCloseFileReturnNull()
    {
        $cityRepository = Mockery::mock(CityRepository::class)->makePartial();
        $cityRepository->shouldReceive('getLine')->andReturn(CityRepositoryBuilder::VALID_CITY_STRING, false);
        $cityRepository->shouldReceive('loadFile')->andReturn(false);
        $cityRepository->shouldReceive('closeFile')->andReturn(true);
        /** @var CityRepository $cityRepository */
        $this->assertNull($cityRepository->getCities());
    }

    public function testGetCitiesOnNotEmptyFileCantLoadFileCantCloseFileReturnNull()
    {
        $cityRepository = Mockery::mock(CityRepository::class)->makePartial();
        $cityRepository->shouldReceive('getLine')->andReturn(CityRepositoryBuilder::VALID_CITY_STRING, false);
        $cityRepository->shouldReceive('loadFile')->andReturn(false);
        $cityRepository->shouldReceive('closeFile')->andReturn(false);
        /** @var CityRepository $cityRepository */
        $this->assertNull($cityRepository->getCities());
    }
}