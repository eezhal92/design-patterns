<?php

namespace Eezhal92\ChainOfResponsibility;

abstract class Handler
{
    private $successor = null;

    final public function append(Handler $handler)
    {
        if (is_null($this->successor)) {
            $this->successor = $handler;
        } else {
            $this->successor->append($handler);
        }
    }

    final public function handle(Request $request)
    {
        $request->handlerClassName = get_called_class();
        $processed = $this->process($request);

        if (!$processed) {
            if (!is_null($this->successor)) {
                $processed = $this->successor->handle($request);
            }
        }

        return $processed;
    }

    abstract protected function process(Request $request);
}
