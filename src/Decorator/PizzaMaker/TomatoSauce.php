<?php

namespace Eezhal92\Decorator\PizzaMaker;

class TomatoSauce extends ToppingDecorator
{
    const COST = 0.50;

    public function __construct(PizzaInterface $pizza)
    {
        parent::__construct($pizza);

        // print "adding tomato sauce...\n";
    }

    public function getDescription()
    {
        return $this->pizza->getDescription().', tomato sauce';
    }

    public function getCost()
    {
        return $this->pizza->getCost() + self::COST;
    }
}
