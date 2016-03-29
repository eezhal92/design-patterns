<?php

namespace Test\Template\Vacation;

use Eezhal92\Template\Vacation\BeachJourney;
use Eezhal92\Template\Vacation\CityJourney;
use Eezhal92\Template\Vacation\Journey;

class TemplateMethodTest extends \PHPUnit_Framework_TestCase
{
    public function test_beach_journey()
    {
        $journey = new BeachJourney();
        $this->expectOutputRegex('#swimming#');
        $journey->takeTrip();
    }

    public function test_city_journey()
    {
        $journey = new CityJourney();
        $this->expectOutputRegex('#get lost#');
        $journey->takeTrip();
    }

    /** test abstract method */
    public function test_palu()
    {
        $journey = $this->getMockForAbstractClass(Journey::class);
        $journey->expects($this->once())
                ->method('enjoy')
                ->will($this->returnCallback([$this, 'mockupVacation']));

        $this->expectOutputRegex('#makan kaledo#');
        $journey->takeTrip();
    }

    public function mockupVacation()
    {
        echo "Pigi2 trus makan kaledo\n";
    }
}
