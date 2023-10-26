<?php

class Product
{
    public $name, $price;
    public function __construct($product_name, $price)
    {
        $this->name = $product_name;
        $this->price = $price;
    }

    public function getDetails()
    {
        echo "Product name: " . $this->name . ' price: ' . $this->price . "<br>";
    }
}
