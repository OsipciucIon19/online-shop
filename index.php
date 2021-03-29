<?php

namespace Module\ProductModule;

use Module\ProductModule\Domain\Product;
use Module\ProductModule\Domain\ProductCollection;
use Module\ProductModule\Domain\ProductRepository;
use Module\ProductModule\Domain\ProductSearchCriteria;

require_once 'D:\UNI\Pentalog\shop\vendor\autoload.php';

/**
 * Testing getProductByCode method
 */

# Positive cases:

$pr = new ProductRepository();
$product = $pr->getProductByCode('00000009');
print_r($product);

# Negative cases:

# Case 1 : No products found with this code
//$product = $pr->getProductByCode('00000007');

/**
 * Testing searchProduct method
 */

# Positive cases:

$pCollection = $pr->searchProduct(new ProductSearchCriteria(10, 1, 'clothes','j'));
print_r($pCollection);

# Negative cases:

#    Case 1 : Invalid limit
//$pCollection = $pr->searchProduct(new ProductSearchCriteria(-10, 1, 'clothes','j'));
#    Case 2 : Invalid page
//$pCollection = $pr->searchProduct(new ProductSearchCriteria(10, -1, 'clothes','j'));
#    Case 3 : No products found
//$pCollection = $pr->searchProduct(new ProductSearchCriteria(10, 1, 'weqergteg','ertert'));

/**
 * Testing createProduct method
 */

# Positive cases:

//$pr->createProduct(new Product('brush','0000000C', 20, 'tools'));

# Negative cases:

#    Case 1 : A product with this code already exists
//$pr->createProduct(new Product('test', '00000000', 2, 'test'));

/**
 * Testing deleteProductByCode method
 */

# Positive cases:

//$pr->deleteProductByCode('0000000C');

# Negative cases:

#    Case 1 : Product not found
//$pr->deleteProductByCode('0222000C');

/**
 * Testing updateProduct method
 */

# Positive cases:

$pr->updateProduct(new Product('jeans', '00000009',234, 'clothes'));

# Negative cases:

#    Case 1 : No product matching this code
//$pr->updateProduct(new Product('test', '0', 2, 'test'));