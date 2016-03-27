<?php

namespace Test\Decorator\PizzaMaker;

use Eezhal92\Decorator\PizzaMaker\Mozzarella;
use Eezhal92\Decorator\PizzaMaker\PlainPizza;
use Eezhal92\Decorator\PizzaMaker\TomatoSauce;

class DecoratorTest extends \PHPUnit_Framework_TestCase
{
    public function test_plain_pizza_must_implements_pizza_interface()
    {
        $className = 'Eezhal92\Decorator\PizzaMaker\PlainPizza';
        $interfaceName = 'Eezhal92\Decorator\PizzaMaker\PizzaInterface';

        $this->assertTrue(is_subclass_of($className, $interfaceName));
    }

    public function test_topping_decorator_must_implements_pizza_interface()
    {
        $className = 'Eezhal92\Decorator\PizzaMaker\ToppingDecorator';
        $interfaceName = 'Eezhal92\Decorator\PizzaMaker\PizzaInterface';

        $this->assertTrue(is_subclass_of($className, $interfaceName));
    }

    public function test_pizza_combination()
    {
        $pizza = new TomatoSauce(new Mozzarella(new PlainPizza()));

        $totalPrice = TomatoSauce::COST + Mozzarella::COST + PlainPizza::COST;

        $this->assertEquals($totalPrice, $pizza->getCost());
    }
}
