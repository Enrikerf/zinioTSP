<?php


namespace App\Tests\Unitary\Domain\City;


class CityBuilder
{


    private ?string $name = null;
    private ?float $x = null;
    private ?float $y = null;

    public static function getBuilder(): CityBuilder
    {
        return new CityBuilder();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }


    /**
     * @param mixed $name
     * @return CityBuilder
     */
    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param float $x
     * @return CityBuilder
     */
    public function x(float $x): CityBuilder
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @param float $y
     * @return CityBuilder
     */
    public function y(float $y): CityBuilder
    {
        $this->y = $y;
        return $this;
    }

    public function build(): City
    {
        return (new City())
            ->setName($this->name)
            ->setX($this->x)
            ->setY($this->y);
    }


}