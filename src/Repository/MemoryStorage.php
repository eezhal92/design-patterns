<?php

namespace Eezhal92\Repository;

class MemoryStorage implements StorageInterface
{
    private $lastId = 0;

    private $data = [];

    public function persist($data)
    {
        $this->data[++$this->lastId] = $data;

        return $this->lastId;
    }

    public function retrieve($id)
    {
        return $this->exists($id) ? $this->data[$id] : null;
    }

    public function delete($id)
    {
        if (!$this->exists($id)) {
            return false;
        }

        $this->data[$id] = null;
        unset($this->data[$id]);

        return true;
    }

    private function exists($id)
    {
        return isset($this->data[$id]);
    }
}
