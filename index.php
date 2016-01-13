<?php
    require('config/config.php');
    require($path.'controllers/loginController.php');
    $controller = new loginController($path);
    $controller->loginPage();
