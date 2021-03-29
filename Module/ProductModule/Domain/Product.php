<?php

namespace Module\ProductModule\Domain;


class Product
{
    private string $name;
    private string $code;
    private float $price;
    private string $category;

    /**
     * Product constructor.
     * @param string $name
     * @param string $code
     * @param float $price
     * @param string $category
     */
    public function __construct(string $name, string $code, float $price, string $category)
    {
        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
        $this->category = $category;
    }

    public static function fromArray(array $product): Product {
        return new Product($product['name'], $product['code'], $product['price'], $product['category']);
    }

    public static function toArray(Product $product): array {
        foreach ($product as $key => $value) {
            $productArr[$key] = $value;
        }
        return $productArr;
    }

    /**
     *  Getters and setters
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }
}
