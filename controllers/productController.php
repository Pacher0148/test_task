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
        $itemMass = $product->getList($_SESSION['userId']);

        if (!is_array($itemMass)) {
            header('Location: /error.html', true, 301);
        } else {
            require($this->path . 'views/list.php');
        }
    }

    public function productPage() {
        if (isset($_GET['productId']) && $_GET['productId'] > 0) {
            require($this->path.'database/product.php');
            $product = new Product($this->path);
            $itemMass = $product->getOne($_GET['productId']);

            if (!is_array($itemMass)) {
                header('Location: /error.html', true, 301);
            } else {
                require($this->path . 'views/bigPage.php');
            }
        }
    }
}