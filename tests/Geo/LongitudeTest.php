<?php

namespace Geo;

class LongitudeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Exception
     */
    public function testLongitudeCannotBeGreaterThanNinetyDegrees()
    {
        new Longitude(181);
    }

    /**
     * @expectedException Exception
     */
    public function testLongitudeCannotBeLowerThanMinusNinetyDegrees()
    {
        new Longitude(-181);
    }

    public function testLongitudeOfMinusOneHundredAndEightyWillBeConvertedToAbsoluteValue()
    {
        $this->assertEquals(180, (string)new Longitude(-180));
    }

    public function testTheStringRepresentationOfLongitudeIsSameAsStringOfValue()
    {
        $this->assertEquals('4.620436', (string)new Longitude(4.620436));
    }
}
 