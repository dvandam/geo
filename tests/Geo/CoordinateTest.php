<?php

namespace Geo;

class CoordinateTest extends \PHPUnit_Framework_TestCase
{
    public function testIfLatitudeIsBiggerThan90ThenTheValueWillBe180MinusValue()
    {
        $coordinate = Coordinate::createByDegrees(100, 0);
        $this->assertEquals(80, (string)$coordinate->getLatitude());
    }

    public function testIfLatitudeIsSmallerThanMinus90ThenTheValueWillBeminus180PlusValue()
    {
        $coordinate = Coordinate::createByDegrees(-100, 0);
        $this->assertEquals(-80, (string)$coordinate->getLatitude());
    }

    public function testIfLatitudeIsBiggerThan90ThenTheLongitudeIsIncreasedBy180()
    {
        $coordinate = Coordinate::createByDegrees(100, -90);
        $this->assertEquals(90, (string)$coordinate->getLongitude());
    }

    public function testIfLatitudeIsSmallerThanMinus90ThenLongitudeIsIncreasedBy180()
    {
        $coordinate = Coordinate::createByDegrees(-100, -90);
        $this->assertEquals(90, (string)$coordinate->getLongitude());
    }

    public function testLatitudeOf190WillBeConvertedToMinus10()
    {
        $coordinate = Coordinate::createByDegrees(190, 0);
        $this->assertEquals(-10, (string)$coordinate->getLatitude());
    }

    public function testLatitudeOfMinus190WillBeConvertedTo10()
    {
        $coordinate = Coordinate::createByDegrees(-190, 0);
        $this->assertEquals(10, (string)$coordinate->getLatitude());
    }

    public function testLatitudeOf280WillBeConvertedToMinus80()
    {
        $coordinate = Coordinate::createByDegrees(280, 0);
        $this->assertEquals(-80, (string)$coordinate->getLatitude());
    }

    public function testLatitudeOfMinus280WillBeConvertedTo80()
    {
        $coordinate = Coordinate::createByDegrees(-280, 0);
        $this->assertEquals(80, (string)$coordinate->getLatitude());
    }

    public function testLongitudeGreaterThan180WillBeReducedBy360()
    {
        $coordinate = Coordinate::createByDegrees(0, 190);
        $this->assertEquals(-170, (string)$coordinate->getLongitude());
    }

    public function testLongitudeSmallerThanMinus180WillBeIncreasedBy360()
    {
        $coordinate = Coordinate::createByDegrees(0, -190);
        $this->assertEquals(170, (string)$coordinate->getLongitude());
    }

    public function testLongitudeGreaterThan360WillBeDecreasedToModulo360()
    {
        $coordinate = Coordinate::createByDegrees(0, 730);
        $this->assertEquals(10, (string)$coordinate->getLongitude());
    }

    public function testLongitudeSmallerThan360WillBeDecreasedToModulo360()
    {
        $coordinate = Coordinate::createByDegrees(0, -730);
        $this->assertEquals(-10, (string)$coordinate->getLongitude());
    }

    public function testLargeLongitudeAndLatitudeMapToNormalValues()
    {
        $coordinate = Coordinate::createByDegrees(550, -730);
        $this->assertEquals(-10, (string)$coordinate->getLatitude());
        $this->assertEquals(170, (string)$coordinate->getLongitude());
    }
}
 