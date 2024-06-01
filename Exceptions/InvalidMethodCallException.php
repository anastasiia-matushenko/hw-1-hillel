<?php

namespace Exceptions;

use Exception;

class InvalidMethodCallException extends Exception
{
    public function __construct(string $className, string $methodName)
    {
        parent::__construct("Method $methodName in $className does not exist.");
    }
}