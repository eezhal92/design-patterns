<?php

namespace Eezhal92\Strategy\Comparator;

class IdComparator implements ComparatorInterface
{

    public function compare($a, $b)
    {
        if ($a['id'] == $b['id']) {
            return 0;
        }

        return $a['id'] < $b['id'] ? -1 : 1;
    }
}