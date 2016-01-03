<?php

class productController
{
    public $path;

    function __construct($path) {
        $this->path = $path;
    }

    public function productList() {
        session_start();

        require($this->path.'database/product.php');
        $product = new Product($this->path);
        $itemMass = $product->getList($_SESSION['userId']);

        require($this->path . 'views/list.php');
    }

    public function productPage() {
        session_start();
        if (isset($_GET['productId']) && $_GET['productId'] > 0) {
            require($this->path.'database/product.php');
            $product = new Product($this->path);
            $itemMass = $product->getOne($_SESSION['userId'], $_GET['productId']);

            require($this->path . 'views/bigPage.php');
        } else {
            header('Location: /error.html', true, 301);
        }
    }
}