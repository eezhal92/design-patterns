<?php

namespace Test\Strategy\Animal;

use Eezhal92\Strategy\Animal\Dog;
use Eezhal92\Strategy\Animal\Bird;
use Eezhal92\Strategy\Animal\Animal;
use Eezhal92\Strategy\Animal\ItCanFly;

class AnimalTest extends \PHPUnit_Framework_TestCase
{

    private $dog;
    private $bird;

    public function setUp()
    {
        $this->dog = new Dog();
        $this->bird = new Bird();
    }

    public function test_concrete_animal_class_extending_abstract_animal_class()
    {
        $this->assertTrue(is_subclass_of(Dog::class, Animal::class));
        $this->assertTrue(is_subclass_of(Bird::class, Animal::class));
    }

    public function test_ability_to_make_sound()
    {        
        $this->assertEquals('woof', $this->dog->makeSound());
        $this->assertEquals('tweet', $this->bird->makeSound());
    }

    public function test_ability_to_fly()
    {
        $this->assertEquals("I can't fly...", $this->dog->tryToFly());
        $this->assertEquals("I'm flying so high", $this->bird->tryToFly());

        // we give dog ability to fly
        $this->dog->setFlyingType(new ItCanFly);
        $this->assertEquals("I'm flying so high", $this->dog->tryToFly());
    }

}