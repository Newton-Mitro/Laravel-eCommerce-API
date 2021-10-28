<?php

namespace App\Exceptions;

use Exception;

class APIException extends Exception
{
    use ExceptionTrait;
    public function report()
    {
        # code...
    }

    public function render($request)
    {
        if ($request->expectsJson()) {
            $this->apiException($request, $this);
        }
    }
}
