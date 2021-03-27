<?php

namespace Module\ProductModule;

use Module\ProductModule\Domain\Product;
use Module\ProductModule\Domain\ProductRepository;

require_once 'D:\UNI\Pentalog\shop\vendor\autoload.php';

$p = new ProductRepository();

//$product = $p->getProductByCode('00000002');

//var_dump($product);

$product = $p->updateProduct(new Product('jeans11','00000009',2345,'clothes'));


