<?php

namespace Eezhal92\Strategy\Comparator;

use LogicException;

class ObjectCollection
{

    private $elements;

    private $comparator;

    public function __construct($elements)
    {
        $this->elements = $elements;
    }

    public function sort()
    {
        if (! $this->comparator) {
            throw new LogicException('Please set comparator.');
        }

        $callback = [$this->comparator, 'compare'];
        uasort($this->elements, $callback);

        return $this->elements;
    }

    public function setComparator(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }
}