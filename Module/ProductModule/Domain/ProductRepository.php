<?php


namespace Module\ProductModule\Domain;


use Module\ProductModule\ProductCatalogServiceInterface;

class ProductRepository implements ProductCatalogServiceInterface
{
    public function getProductByCode(string $productCode): Product
    {
        $json = file_get_contents('.\products.json', true);
        $productsList = json_decode($json);
        $product = new Product();

        foreach ($productsList as $key => $value) {
            $product->{$key} = $value;
        }


        return $product;
    }

    public function searchProduct(ProductSearchCriteria $criteria): ProductCollection
    {
        // TODO: Create ProductSearchCriteria class
    }

    public function createProduct(Product $product): bool
    {
        // TODO: Convert object to Json

        // TODO: Insert Json to products.json

    }

    public function updateProduct(Product $product): bool
    {
        // TODO: Get the product to change

        // TODO: Replace product with the new product passed in parameters

        // TODO: Insert Json to products.json
    }

    public function deleteProductByCode(string $productCode): bool
    {
        // TODO: Delete product
    }
}

