<?php

namespace Geo;

class Latitude
{
    /**
     * @var float
     */
    private $value;

    /**
     * @param float $latitude
     */
    public function __construct($latitude)
    {
        if ($latitude > 90) {
            throw new Exception("Latitude $latitude cannot be greater than 90 degrees");
        }
        if ($latitude < -90) {
            throw new Exception("Latitude $latitude cannot be smaller than -90 degrees");
        }

        $this->value = $latitude;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }
}