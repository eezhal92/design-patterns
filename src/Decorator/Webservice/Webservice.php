<?php

namespace Eezhal92\Decorator\Webservice;

class Webservice implements RendererInterface
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function renderData()
    {
        return $this->data;
    }
}
