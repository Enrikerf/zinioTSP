<?php


namespace App\Adapter\out\Persistence;


use PHPUnit\Exception;

class CityRepository
{

    private $fileHandler;
    private string $citiesFilePath;

    public function __construct()
    {
        $this->citiesFilePath = __DIR__ . '/../../in/Command/cities.txt';
    }

    public function loadFile(): bool
    {
        try {
            if ($this->fileHandler = fopen($this->citiesFilePath, "r")) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getLine()
    {
        return fgets($this->fileHandler);
    }

    public function closeFile(): bool
    {
        try {
            if (fclose($this->fileHandler)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getCities(): ?array
    {
        if ($this->loadFile()) {
            $citiesStringArray = null;
            while (($line = $this->getLine()) !== false) {
                $citiesStringArray[] = $line;
            }
            if (!$this->closeFile()) {
                return null;
            }
            return $citiesStringArray;
        } else {
            return null;
        }
    }
}