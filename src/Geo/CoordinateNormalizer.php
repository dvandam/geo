<?php

namespace Geo;

class CoordinateNormalizer
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->normalize();
    }

    private function normalize()
    {
        $this->normalizeLatitude();
        $this->adjustLongitudeForLatitudesOnOtherSide();
        $this->normalizeLongitude();
    }

    private function normalizeLatitude()
    {
        $multiplier = 1;
        if ($this->latitude < 0) {
            $multiplier = -1;
        }

        $this->latitude = (abs($this->latitude) + 180) % 360 - 180;
        $this->latitude = $this->latitude * $multiplier;
    }

    private function adjustLongitudeForLatitudesOnOtherSide()
    {
        if ($this->latitude > 90) {
            $this->latitude = 180 - $this->latitude;
            $this->longitude = $this->longitude + 180;
        }

        if ($this->latitude < -90) {
            $this->latitude = -180 - $this->latitude;
            $this->longitude = $this->longitude + 180;
        }
    }

    private function normalizeLongitude()
    {
        $this->longitude = $this->longitude % 360;

        if ($this->longitude > 180) {
            $this->longitude = $this->longitude - 360;
        }

        if ($this->longitude < -180) {
            $this->longitude = $this->longitude + 360;
        }
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
 