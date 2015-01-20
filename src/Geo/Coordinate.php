<?php

namespace Geo;

class Coordinate
{
    /**
     * @var Latitude
     */
    private $latitude;

    /**
     * @var Longitude
     */
    private $longitude;

    /**
     * @param Latitude $latitude
     * @param Longitude $longitude
     */
    public function __construct(Latitude $latitude, Longitude $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return Latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return Longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @return Coordinate
     */
    public static function createByDegrees($latitude, $longitude)
    {
        $normalizer = new CoordinateNormalizer($latitude, $longitude);

        return new self(
            new Latitude($normalizer->getLatitude()),
            new Longitude($normalizer->getLongitude())
        );
    }
}
 