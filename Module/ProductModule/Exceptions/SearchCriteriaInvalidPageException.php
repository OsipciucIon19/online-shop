<?php

namespace Module\ProductModule\Exceptions;

use DomainException;
use Throwable;


class SearchCriteriaInvalidPageException extends DomainException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}