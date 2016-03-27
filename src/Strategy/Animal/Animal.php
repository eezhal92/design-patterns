<?php

namespace Eezhal92\Strategy\Animal;

abstract class Animal
{
    protected $flyingType;

    protected $sound;

    public function makeSound()
    {
        return $this->sound;
    }

    public function setSound($sound)
    {
        $this->sound = $sound;
    }

    public function setFlyingType(FlyInterface $flyingType)
    {
        $this->flyingType = $flyingType;
    }

    public function tryToFly()
    {
        return $this->flyingType->fly();
    }

}