<?php

namespace Module\ProductModule\Exceptions;

use DomainException;
use Throwable;

class ProductCodeDuplicateException extends DomainException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}