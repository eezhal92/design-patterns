<?php

namespace Eezhal92\Strategy\Animal;

class Bird extends Animal
{

    public function __construct()
    {
        $this->sound = 'tweet';
        $this->flyingType = new ItCanFly;
    }

}