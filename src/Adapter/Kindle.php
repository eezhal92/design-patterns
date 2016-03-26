<?php

namespace Eezhal92\Adapter;

class Kindle implements EBookInterface
{

    public function turnOn()
    {
        return 'turn the '.__CLASS__.' on';
    }

    public function pressNextButton()
    {
        return 'press the next button on '.__CLASS__;
    }
    
}