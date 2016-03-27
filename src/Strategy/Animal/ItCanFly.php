<?php

namespace Eezhal92\Strategy\Animal;

class ItCanFly implements FlyInterface
{

    public function fly()
    {
        return "I'm flying so high";
    }
    
}