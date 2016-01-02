<?php

class loginController
{
    public $path;

    function __construct($path) {
        $this->path = $path;
    }

    public function loginPage($error = 'none') {
        include($this->path.'views/login.php');
    }

    public function loginAction() {
        include($this->path.'database/user.php');

        if (isset($_POST['username'], $_POST['userpass'])) {
            $user = new User($this->path);
            if ($user->checkData($_POST['username'], $_POST['userpass'])) {
                header('/config/routing.php?file=productController&action=list');
            } else {
                $this->loginPage('Incorrect data');
            }
        } else {
            $this->loginPage('Missed data');
        }
    }
}