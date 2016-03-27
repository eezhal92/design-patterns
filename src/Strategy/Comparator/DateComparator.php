<?php

namespace Eezhal92\Strategy\Comparator;

use DateTime;

class DateComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        $dateA = new DateTime($a['date']);
        $dateB = new DateTime($b['date']);

        if ($dateA == $dateB) {
            return 0;
        }

        return $dateA < $dateB ? -1 : 1;
    }
}
