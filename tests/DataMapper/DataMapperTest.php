<?php

namespace Test\DataMapper;

use Eezhal92\DataMapper\User;
use Eezhal92\DataMapper\UserMapper;

class DataMapperTest extends \PHPUnit_Framework_TestCase
{
    private $dbal;

    private $mapper;

    public function setUp()
    {
        $this->dbal = $this->getMockBuilder('Eezhal92\DataMapper\DBAL')
                           ->disableAutoload()
                           ->setMethods(['insert', 'update', 'find', 'findAll'])
                           ->getMock();

        $this->mapper = new UserMapper($this->dbal);
    }

    public function getExistingUser()
    {
        return [
            [new User(1, 'Dayle', 'dayle@mail.com')],
        ];
    }

    public function test_persist_new_user()
    {
        $this->dbal->expects($this->once())
                   ->method('insert');

        $this->mapper->save(new User(null, 'John', 'john@mail.com'));
    }

    /** @dataProvider getExistingUser */
    public function test_persist_existing_user(User $user)
    {
        $this->dbal->expects($this->once())
                   ->method('update');

        $this->mapper->save($user);
    }

    /** @dataProvider getExistingUser */
    public function test_find_one(User $existing)
    {
        $row = [
            'id' => 1,
            'name' => 'Dayle',
            'email' => 'dayle@mail.com',
        ];

        $rows = new \ArrayIterator([$row]);

        $this->dbal->expects($this->once())
                   ->method('find')
                   ->with(1)
                   ->will($this->returnValue($rows));

        $user = $this->mapper->findById(1);
        $this->assertEquals($existing, $user);
    }

    /** @dataProvider getExistingUser */
    public function test_find_all(User $existing)
    {
        $rows = [
            ['id' => 1, 'name' => 'Dayle', 'email' => 'dayle@mail.com'],
        ];

        $this->dbal->expects($this->once())
                   ->method('findAll')
                   ->will($this->returnValue($rows));

        $users = $this->mapper->findAll();
        $this->assertEquals([$existing], $users);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedMessage User #404 not found
     */
    public function test_not_found()
    {
        $this->dbal->expects($this->once())
                   ->method('find')
                   ->with(999)
                   ->will($this->returnValue([]));

        $this->mapper->findById(999);
    }
}