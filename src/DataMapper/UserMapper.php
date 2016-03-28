<?php

namespace Eezhal92\DataMapper;

class UserMapper
{
    /**
     * @var DBAL
     */
    protected $adapter;

    public function __construct(DBAL $dbal)
    {
        $this->adapter = $dbal;
    }

    public function findAll()
    {
        $results = $this->adapter->findAll();

        $entries = [];

        foreach ($results as $result) {
            $entries[] = $this->mapObject($result);
        }

        return $entries;
    }

    public function findById($id)
    {
        $result = $this->adapter->find($id);

        if (count($result) == 0) {
            throw new \InvalidArgumentException("User #$id not found");
        }

        $row = $result->current();

        return $this->mapObject($row);
    }

    public function save(User $user)
    {
        $data = [
            'id'    => $user->getId(),
            'name'  => $user->getName(),
            'email' => $user->getEmail(),
        ];

        if ($data['id'] == null) {
            unset($data['id']);
            $this->adapter->insert($data);

            return true;
        }

        $this->adapter->update($data, ['id' => $user->getId()]);

        return true;
    }

    protected function mapObject(array $row)
    {
        $entry = new User();
        $entry->setId($row['id']);
        $entry->setName($row['name']);
        $entry->setEmail($row['email']);

        return $entry;
    }
}
