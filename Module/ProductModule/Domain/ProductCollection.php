<?php

namespace Module\ProductModule\Domain;

use ArrayObject;

class ProductCollection extends ArrayObject
{
    public function __construct(Product ...$products)
    {
        parent::__construct($products);
    }
}