<?php

trait Printer
{
    public function showProductList(): void
    {
        echo implode("\n", array_map(function (Product $p) {
                return $p->name . "\t" . $p->price;
            }, $this->products)) . "\n\n";
    }
}