<?php

namespace Eezhal92\Decorator\PizzaMaker;

class Mozzarella extends ToppingDecorator
{

    const COST = 0.30;

    public function __construct(PizzaInterface $pizza)
    {
        parent::__construct($pizza);

        // print "adding mozzarella...\n";
    }

    public function getDescription()
    {
        return $this->pizza->getDescription() . ', mozzarella';
    }

    public function getCost()
    {
        return $this->pizza->getCost() + self::COST;
    }
    
}