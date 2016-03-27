<?php

namespace Eezhal92\Strategy\Animal;

class ItCannotFly implements FlyInterface
{
    public function fly()
    {
        return "I can't fly...";
    }
}
