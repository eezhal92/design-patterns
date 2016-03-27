<?php

namespace Eezhal92\Strategy\Animal;

class Dog extends Animal
{

    public function __construct()
    {
        $this->sound = 'woof';
        $this->flyingType = new ItCannotFly;
    }

}