<?php

namespace Eezhal92\Decorator\PizzaMaker;

abstract class ToppingDecorator implements PizzaInterface
{
    protected $pizza;

    public function __construct(PizzaInterface $pizza)
    {
        $this->pizza = $pizza;
    }
}
