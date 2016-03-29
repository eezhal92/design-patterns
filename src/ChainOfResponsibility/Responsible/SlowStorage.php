<?php

namespace Eezhal92\ChainOfResponsibility\Responsible;

use Eezhal92\ChainOfResponsibility\Handler;
use Eezhal92\ChainOfResponsibility\Request;

class SlowStorage extends Handler
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    protected function process(Request $request)
    {
        if ($request->verb == 'get') {
            if (array_key_exists($request->key, $this->data)) {
                $request->response = $this->data[$request->key];

                return true;
            }
        }

        return false;
    }
}
