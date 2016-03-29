<?php

namespace Eezhal92\Template\Vacation;

abstract class Journey
{
    final public function takeTrip()
    {
        $this->buyAFlight();
        $this->takePlane();
        $this->enjoy();
        $this->buyGift();
        $this->takePlane();
    }

    abstract protected function enjoy();

    protected function buyGift()
    {
    }

    private function buyAFlight()
    {
        echo "Buy a flight\n";
    }

    private function takePlane()
    {
        echo "Taking the plane\n";
    }
}
