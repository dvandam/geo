<?php

namespace Geo;

class Longitude
{
    /**
     * @var float
     */
    private $value;

    /**
     * @param float $longitude
     */
    public function __construct($longitude)
    {
        if ($longitude > 180) {
            throw new Exception("Longitude $longitude cannot be greater than 180 degrees");
        }
        if ($longitude < -180) {
            throw new Exception("Longitude $longitude cannot be smaller than -180 degrees");
        }

        if ($longitude == -180) {
            $longitude = 180;
        }

        $this->value = $longitude;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }
}