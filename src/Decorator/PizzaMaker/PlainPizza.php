<?php

namespace Eezhal92\Decorator\PizzaMaker;

class PlainPizza implements PizzaInterface
{
    const COST = 4.0;

    public function __construct()
    {
        // print "adding plain pizza...\n";
    }

    public function getDescription()
    {
        return 'thin dough';
    }

    public function getCost()
    {
        return self::COST;
    }
}
