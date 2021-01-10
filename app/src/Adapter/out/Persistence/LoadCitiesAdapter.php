<?php

namespace App\Adapter\out\Persistence;

use App\Application\Port\out\Persistence\LoadCitiesPort;
use App\Tests\Unitary\Domain\City\City;
use App\Tests\Unitary\Domain\City\CityBuilder;

class LoadCitiesAdapter implements LoadCitiesPort
{

    private CityRepository $citiesRepository;

    public function __construct(CityRepository $citiesRepository)
    {
        $this->citiesRepository = $citiesRepository;
    }

    public function getCities(): ?array
    {
        if (empty($citiesStringArray = $this->citiesRepository->getCities())) {
            return null;
        }
        $cities = [];
        foreach ($citiesStringArray as $cityString) {
            $city = $this->mapperString2Model($cityString);
            if ($city === null) {
                return null;
            }
            $cities[] = $city;
        }
        return $cities;
    }

    private function mapperString2Model(string $cityString): ?City
    {

        $cityElements = $this->getCityStringElements($cityString);
        $firstElementIsText = false;
        $firstNumberObtained = false;
        $secondNumberObtained = false;
        $name = "";
        $x = null;
        $y = null;

        foreach ($cityElements as $element) {
            if (!is_numeric($element)) {
                if ($firstElementIsText) {
                    $name .= " " . $element;
                } else {
                    $firstElementIsText = true;
                    $name .= $element;
                }

            } else {
                if (!$firstElementIsText) {
                    return null;
                }
                if (!$firstNumberObtained) {
                    $firstNumberObtained = true;
                    $x = $element;
                } else {
                    if (!$secondNumberObtained) {
                        $firstNumberObtained = true;
                        $y = $element;
                    } else {
                        return null;
                    }
                }

            }
        }
        if (empty($name) || empty($x) || empty($y)) {
            return null;
        }

        return (new CityBuilder())
            ->name($name)
            ->x($x)
            ->y($y)
            ->build();

    }

    private function getCityStringElements(string $cityString)
    {
        $cityString = str_replace("\r\n", "", $cityString);
        return explode(" ", $cityString);
    }
}