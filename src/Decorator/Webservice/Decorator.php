<?php

namespace Eezhal92\Decorator\Webservice;

abstract class Decorator implements RendererInterface
{
    protected $wrapped;

    public function __construct(RendererInterface $wrappable)
    {
        $this->wrapped = $wrappable;
    }
}
