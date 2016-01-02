<?php
    require('config/config.php');
    if (!mysqli_connect('localhost', $user, $pass)) {
        die('Database unavailable');
    }

    require($path.'controllers/loginController.php');
    $controller = new loginController($path);
    $controller->loginPage();
