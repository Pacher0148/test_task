<?php
    session_start();
    require('config.php');
    if (isset($_GET['file'], $_GET['action'])) {
        if ($_GET['file'] == 'loginController') {
            require($path.'controllers/'.$_GET['file'].'.php');
            $controller = new $_GET['file']($path);
            $controller->$_GET['action']();
        } else {
            if (!isset($_SESSION) || empty($_SESSION['userId'])) {
                header('Location: /error.html', true, 301);
            } else {
                require($path.'controllers/'.$_GET['file'].'.php');
                $controller = new $_GET['file']($path);
                $controller->$_GET['action']();
            }
        }
    } else {
        header('Location: /error.html', true, 301);
    }