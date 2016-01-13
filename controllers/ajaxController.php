<?php

class ajaxController
{
    public $path;

    function __construct($path) {
        $this->path = $path;
    }

    public function rateProduct() {
        $response = 'fail';
        if (isset($_POST['userId'], $_POST['productId'], $_POST['rate'])) {
            require($this->path.'database/rateAndComment.php');
            $productData = new RateAndComment($this->path);
            $productData->saveRate($_POST['userId'], $_POST['productId'], $_POST['rate']);
            $response = 'success';
        }
        echo json_encode($response);
    }

    public function commentProduct() {
        $response = 'fail';
        if (isset($_POST['userId'], $_POST['productId'], $_POST['comment'])) {
            require($this->path.'database/rateAndComment.php');
            $productData = new RateAndComment($this->path);
            $productData->saveComment($_POST['userId'], $_POST['productId'], htmlentities($_POST['comment']));
            $response = 'success';
        }
        echo json_encode($response);
    }
}
