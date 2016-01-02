<?php

class ajaxController
{
    public $path;

    function __construct($path) {
        $this->path = $path;
    }

    public function raitProduct() {
        $response = 'fail';
        if (isset($_POST['userId'], $_POST['productId'], $_POST['rait'])) {
            require($this->path.'database/raitAndComment.php');
            $productData = new RaitAndComment($this->path);
            $productData->saveRait($_POST['userId'], $_POST['productId'], $_POST['rait']);
            $response = 'success';
        }
        echo json_encode($response);
    }

    public function commentProduct() {

    }
}