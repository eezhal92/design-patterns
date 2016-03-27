<?php

namespace Test\Strategy\Comparator;

use Eezhal92\Strategy\Comparator\IdComparator;
use Eezhal92\Strategy\Comparator\DateComparator;
use Eezhal92\Strategy\Comparator\ObjectCollection;
use Eezhal92\Strategy\Comparator\ComparatorInterface;

class StrategyTest extends \PHPUnit_Framework_TestCase
{

    public function getIdCollection()
    {
        return [
            [
                [['id' => 2], ['id' => 1], ['id' => 3]],
                ['id' => 1]
            ],
            [
                [['id' => 3], ['id' => 2], ['id' =>1]],
                ['id' => 1]
            ],
        ];
    }    

    public function getDateCollection()
    {
        return [
            [
                [['date' => '2016-03-02'], ['date' => '2016-03-01'], ['date' => '2016-03-03']],
                ['date' => '2016-03-01']
            ],
            [
                [['date' => '2016-03-03'], ['date' => '2016-03-02'], ['date' => '2016-03-01']],
                ['date' => '2016-03-01']
            ],
        ];
    }

    public function test_concrete_comparator_implements_comparator_interface()
    {
        $this->assertTrue(is_subclass_of(IdComparator::class, ComparatorInterface::class));
        $this->assertTrue(is_subclass_of(DateComparator::class, ComparatorInterface::class));
    }

    /** 
     * @expectedException LogicException
     * @dataProvider getIdCollection
     */
    public function test_object_collection_throws_exception_when_comparator_not_set($collection)
    {
        $objCollection = new ObjectCollection($collection);        
        $elements = $objCollection->sort();
    }

    /** @dataProvider getIdCollection */
    public function test_id_comparator($collection, $expected)
    {
        $objCollection = new ObjectCollection($collection);
        $objCollection->setComparator(new IdComparator);

        $elements = $objCollection->sort();

        $firsElement = array_shift($elements);
        $this->assertEquals($expected, $firsElement);
    }

    /** @dataProvider getDateCollection */
    public function test_date_comparator($collection, $expected)
    {
        $objCollection = new ObjectCollection($collection);
        $objCollection->setComparator(new DateComparator);

        $elements = $objCollection->sort();

        $firsElement = array_shift($elements);
        $this->assertEquals($expected, $firsElement);
    }
    
}