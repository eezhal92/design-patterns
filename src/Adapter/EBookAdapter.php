<?php

namespace Eezhal92\Adapter;

class EBookAdapter implements BookInterface
{
    protected $ebook;

    public function __construct(EBookInterface $ebook)
    {
        $this->ebook = $ebook;
    }

    public function open()
    {
        return $this->ebook->turnOn();
    }

    public function turnPage()
    {
        return $this->ebook->pressNextButton();
    }
}
