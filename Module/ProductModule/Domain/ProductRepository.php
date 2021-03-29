<?php


namespace Module\ProductModule\Domain;


use Module\ProductModule\Exceptions\ProductCodeDuplicateException;
use Module\ProductModule\Exceptions\ProductNotFoundException;
use Module\ProductModule\ProductCatalogServiceInterface;

class ProductRepository implements ProductCatalogServiceInterface
{

    public function load(): array
    {
        $json = file_get_contents('D:\UNI\Pentalog\shop\Module\ProductModule\products.json');
        return json_decode($json, true);
    }

    public function save(array $productsList)
    {
        $save = json_encode(array_values($productsList), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('D:\UNI\Pentalog\shop\Module\ProductModule\products.json', $save);
    }

    public function searchByColumn($product, string $key, string $criteria): bool
    {
        if (strpos($product[$key], $criteria) !== false) return true;
        else return false;
    }

    public function getProductByCode(string $productCode): Product
    {
        $productsList = $this->load();
        $i = 1;

        foreach ($productsList as $product) {
            if ($product['code'] === $productCode) {
                return Product::fromArray($product);
            } else {
                $i++;
            }
        }
        if ($i !== count($productsList)) throw new ProductNotFoundException('Product not found');
    }

    public function searchProduct(ProductSearchCriteria $criteria): ProductCollection
    {
        $productsList = $this->load();

        if (!empty($criteria->getName())) {
            $productsList = array_filter($productsList, fn($product) => $this->searchByColumn($product, 'name', $criteria->getName()));
        }

        if (!empty($criteria->getCategory())) {
            $productsList = array_filter($productsList, fn($product) => $this->searchByColumn($product, 'category', $criteria->getCategory()));
        }

        $offset = ($criteria->getPage() - 1) * $criteria->getLimit();
        $productsList = array_slice($productsList, $offset, $criteria->getLimit());
        $productsList = array_map([Product::class, 'fromArray'], $productsList);

        if (empty($productsList)) throw new ProductNotFoundException('Did not found any products matching criteria');

        return new ProductCollection(...$productsList);
    }

    public function createProduct(Product $product): bool
    {
        $productsList = $this->load();

        foreach ($productsList as $p) {
            if ($p['code'] === $product->getCode()) {
                throw new ProductCodeDuplicateException('A product with this code already exists');
            }
        }

        $productsList[] = Product::toArray($product);

        $this->save($productsList);

        return true;
    }

    public function updateProduct(Product $product): bool
    {
        $productsList = $this->load();
        $i = 1;

        foreach ($productsList as $key => $p) {
            if ($p['code'] === $product->getCode()) {
                $productsList[$key] = Product::toArray($product);
                $this->save($productsList);

                return true;
            } else $i++;
        }
        if ($i !== count($productsList)) throw new ProductNotFoundException('Did not found any matching product');
    }

    public function deleteProductByCode(string $productCode): bool
    {
        $productsList = $this->load();
        $i = 1;
        foreach ($productsList as $key => $product) {
            if ($product['code'] === $productCode) {
                unset($productsList[$key]);
                $this->save($productsList);

                return true;
            } else $i++;
        }
        if ($i !== count($productsList)) throw new ProductNotFoundException('A product with this code did not found');
    }
}

