<?php

class loginController
{
    public $path;

    function __construct($path) {
        $this->path = $path;
    }

    public function loginPage($error = 'none') {
        require($this->path.'views/login.php');
    }

    public function loginAction() {
        require($this->path.'database/user.php');

        if (isset($_POST['username'], $_POST['userpass'])) {
            $user = new User($this->path);
            $userId = $user->checkData($_POST['username'], $_POST['userpass']);
            if ($userId && $userId > 0) {
                session_start();
                $_SESSION['userId'] = intval($userId);
                header('Location: /config/routing.php?file=productController&action=productList', true, 301);
            } else {
                $this->loginPage('Incorrect data');
            }
        } else {
            $this->loginPage('Missed data');
        }
    }
}