<?php

namespace Test\Repository;

use Eezhal92\Repository\User;
use Eezhal92\Repository\MemoryStorage;
use Eezhal92\Repository\UserRepository;
use Eezhal92\Repository\StorageInterface;

class RepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $memoryStorage;

    public function setUp()
    {
        $this->memoryStorage = new MemoryStorage;
    }

    public function test_memory_storage_implements_memory_interface()
    {
        $this->assertTrue(is_subclass_of(MemoryStorage::class, StorageInterface::class));
    }

    public function test_memory_storage_functionalities()
    {   
        $data = ['field' => 'something'];

        $this->assertEquals($this->memoryStorage->persist($data), 1);
        $this->assertEquals($this->memoryStorage->retrieve(1), $data);
        $this->assertEquals($this->memoryStorage->retrieve(2), null);

        $data2 = ['foo' => 'bar'];
        $this->memoryStorage->persist($data2);
        $this->assertEquals($this->memoryStorage->retrieve(2), $data2);

        $this->memoryStorage->delete(1);
        $this->assertEquals($this->memoryStorage->retrieve(1), null);
        $this->assertFalse($this->memoryStorage->delete(1));
    }

    public function test_user_repository()
    {
        $userRepo = new UserRepository($this->memoryStorage);

        $user = new User(null, 'John', 'john@mail.com');
        $user2 = new User(null, 'Jane', 'jane@mail.com');
        
        $userRepo->save($user);
        $userRepo->save($user2);

        $this->assertEquals($userRepo->getById(1), $user);
        $this->assertEquals($userRepo->getById(1)->getName(), 'John');
        $this->assertEquals($userRepo->getById(2)->getName(), 'Jane');
    }
}
