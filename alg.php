<?php

require_once './Product.php';
require_once './Catalog.php';
require_once './Basket.php';

$limitPriceMin = 10;
$limitPriceMax = 150;

$limitCountMin = 5;
$limitCountMax = 7;

$catalog = new Catalog;
for ($i = 0; $i < 100; $i++) {
    $product = new Product;
    // $product->price = rand(1, 100);
    $product->price = $i;
    $product->name = uniqid();
    $catalog->addProduct($product);
}
$catalog->sortProducts();
// $catalog->showProductList();

$basket = new Basket;
foreach ($catalog->getProducts() as $product) {
    if ($basket->getCount() < $limitCountMax && $basket->getPrice() + $product->price <= $limitPriceMax) {
        $basket->addProduct($product);
        continue;
    }
    $productFromBasket = $basket->getFirstProduct();
    if (!$productFromBasket) {
        break;
    }
    if ($basket->getPrice() - $productFromBasket->price + $product->price <= $limitPriceMax) {
        $basket->delProduct($productFromBasket);
        $basket->addProduct($product);
    } else {
        break;
    }
}

$basket->showProductList();