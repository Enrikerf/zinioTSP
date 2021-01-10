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
        $filled = $this->fillCityBuilder($cityBuilder = new CityBuilder(), $this->getCityStringElements($cityString));
        if ($filled) {
            return $cityBuilder->build();
        } else {
            return null;
        }
    }

    public function fillCityBuilder(CityBuilder $cityBuilder, array $cityStringElements): bool
    {
        $firstElementIsText = false;
        $firstNumberObtained = false;
        $secondNumberObtained = false;
        foreach ($cityStringElements as $element) {
            if (!is_numeric($element)) {
                if ($firstElementIsText) {
                    $cityBuilder->name($cityBuilder->getName() . " " . $element);
                } else {
                    $firstElementIsText = true;
                    $cityBuilder->name($element);
                }
            } else {
                if (!$firstElementIsText) {
                    return false;
                }
                if (!$firstNumberObtained) {
                    $firstNumberObtained = true;
                    $cityBuilder->x(floatval($element));
                } else {
                    if (!$secondNumberObtained) {
                        $secondNumberObtained = true;
                        $cityBuilder->y(floatval($element));
                    } else {
                        return false;
                    }
                }
            }
        }
        return $firstElementIsText && $firstNumberObtained && $secondNumberObtained;
    }

    private function getCityStringElements(string $cityString)
    {
        $cityString = str_replace("\r\n", "", $cityString);
        return explode(" ", $cityString);
    }
}