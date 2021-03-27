<?php


namespace Module\ProductModule\Domain;


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

    public function getProductByCode(string $productCode): Product
    {
        $productsList = $this->load();

        foreach ($productsList as $product) {
            if ($product['code'] === $productCode) {
                return Product::forArray($product);
            }
        }
    }

    public function searchProduct(ProductSearchCriteria $criteria): ProductCollection
    {
        $productsList = $this->load();

        # NOT WORKING CODE!
//        if(!empty($criteria->getName())) {
//            $productsList = array_filter($productsList, fn (Product $product) => $this->searchByColumn($product, 'name', $criteria->getName()));
//        }
//        if(!empty($criteria->getCategory())) {
//            $productsList = array_filter($productsList, fn (Product $product) => $this->searchByColumn($product, 'name', $criteria->getCategory()));
//        }

        return new ProductCollection(Product::forArray($productsList));
    }


    public function createProduct(Product $product): bool
    {
        $productsList = $this->load();
        $productsList[] = Product::toArray($product);
        $this->save($productsList);

        return true;
    }

    public function updateProduct(Product $product): bool
    {
        $productsList = $this->load();

        foreach ($productsList as $key => $p) {
            if ($p['code'] === $product->getCode()) {
                $productsList[$key] = Product::toArray($product);
            }
        }

        $this->save($productsList);

        return true;
    }

    public function deleteProductByCode(string $productCode): bool
    {
        $productsList = $this->load();

        foreach ($productsList as $key => $product) {
            if ($product['code'] === $productCode) {
                unset($productsList[$key]);
            }
        }
        $this->save($productsList);

        return true;
    }
}

