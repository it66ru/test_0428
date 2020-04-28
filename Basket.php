<?php

require_once './Printer.php';

class Basket
{
    use Printer;

    private array $products = [];
    private int $count = 0;
    private int $price = 0;

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->count++;
        $this->price += $product->price;
    }

    public function delProduct(Product $product): void
    {
        foreach ($this->products as $i => $_product) {
            if ($product->equals($_product)) {
                $this->count--;
                $this->price -= $product->price;
                unset($this->products[$i]);
            }
        }
    }

    public function getFirstProduct(): ?Product
    {
        $_products = array_values($this->products);
        return $_products[0] ?? null;
    }

    public function getProductWithMinPrice(): ?Product
    {
        $_price = null;
        $_product = null;
        foreach ($this->products as $product) {
            if (!$_price || $product->price < $_price) {
                $_product = $product;
            }
        }
        return $_product;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getCount(): int
    {
        return $this->count;
    }

}
