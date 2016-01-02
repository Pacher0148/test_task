<?php

class productController
{
    public $path;

    function __construct($path) {
        $this->path = $path;
    }

    public function productList() {
        require($this->path.'database/product.php');
        $product = new Product($this->path);
        $itemMass = $product->getList();

        require($this->path . 'views/list.php');
    }
}