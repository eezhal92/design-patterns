<?php

namespace Eezhal92\Repository;

interface StorageInterface
{
    public function persist($data);

    public function retrieve($id);

    public function delete($id);
}
