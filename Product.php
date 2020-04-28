<?php

class Product
{
    public int $price;
    public string $name;

    public function equals(Product $product): bool
    {
        return $this->name == $product->name
            && $this->price == $product->price;
    }
}
