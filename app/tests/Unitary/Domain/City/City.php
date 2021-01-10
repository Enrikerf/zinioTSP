<?php


namespace App\Tests\Unitary\Domain\City;


class City
{

    private string $name;
    private float $x;
    private float $y;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return City
     */
    public function setName(string $name): City
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @param float $x
     * @return City
     */
    public function setX(float $x): City
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @param float $y
     * @return City
     */
    public function setY(float $y): City
    {
        $this->y = $y;
        return $this;
    }





}