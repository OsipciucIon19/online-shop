<?php


namespace Module\ProductModule\Domain;


use Module\ProductModule\ProductCatalogServiceInterface;

class ProductRepository implements ProductCatalogServiceInterface
{

    public function getProductByCode(string $productCode): Product
    {
        // TODO: Implement getProductByCode() method.
    }

    public function searchProduct(ProductSearchCriteria $criteria): ProductCollection
    {
        // TODO: Implement searchProduct() method.
    }

    public function createProduct(Product $product): bool
    {
        // TODO: Implement createProduct() method.
    }

    public function updateProduct(Product $product): bool
    {
        // TODO: Implement updateProduct() method.
    }

    public function deleteProductByCode(string $productCode): bool
    {
        // TODO: Implement deleteProductByCode() method.
    }
}