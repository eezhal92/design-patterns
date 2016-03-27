<?php

namespace Eezhal92\Decorator\Webservice;

class XmlRenderer extends Decorator
{
    public function renderData()
    {
        $doc = new \DOMDocument();

        foreach ($this->wrapped->renderData() as $key => $val) {
            $doc->appendChild($doc->createElement($key, $val));
        }

        return $doc->saveXML();
    }
}
