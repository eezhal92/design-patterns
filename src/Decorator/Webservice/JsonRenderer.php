<?php

namespace Eezhal92\Decorator\Webservice;

class JsonRenderer extends Decorator
{

    public function renderData()
    {
        return json_encode($this->wrapped->renderData());
    }
    
}