<?php

namespace Eezhal92\Adapter;

class Book implements BookInterface
{
    public function open()
    {
        return 'opening the paper book';
    }

    public function turnPage()
    {
        return 'turning the page of paper book';
    }
}
