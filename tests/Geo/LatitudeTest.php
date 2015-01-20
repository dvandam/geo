<?php

namespace Geo;

class LatitudeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Exception
     */
    public function testLatitudeCannotBeGreaterThanNinetyDegrees()
    {
        new Latitude(91);
    }

    /**
     * @expectedException Exception
     */
    public function testLatitudeCannotBeLowerThanMinusNinetyDegrees()
    {
        new Latitude(-91);
    }

    public function testTheStringRepresentationOfLatitudeIsSameAsStringOfValue()
    {
        $this->assertEquals('52.382599', (string)new Latitude(52.382599));//4.620436
    }
}
