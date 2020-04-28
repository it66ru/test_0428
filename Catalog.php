<?php

require_once './Printer.php';

class Catalog
{
    use Printer;

    private array $products = [];

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getProductWithMaxPrice(): ?Product
    {
        $_price = 0;
        $_product = null;
        foreach ($this->products as $product) {
            if ($product->price > $_price) {
                $_product = $product;
            }
        }
        return $_product;
    }

    public function sortProducts(): void
    {
        usort ($this->products, function (Product $p1, Product $p2) {
            return $p1->price <=> $p2->price;
        });
    }

    public function getProducts(): array
    {
        return $this->products;
    }

}
