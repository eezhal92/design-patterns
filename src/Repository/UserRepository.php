<?php

namespace Eezhal92\Repository;

class UserRepository
{
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function save(User $user)
    {
        return $this->storage->persist($user);
    }

    public function getById($id)
    {
        return $this->storage->retrieve($id);
    }

    public function delete($id)
    {
        return $this->storage->delete($id);
    }
}
