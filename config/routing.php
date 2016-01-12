<?php
    session_start();
    require('config.php');
    require('routes.php');

    if (isset($_GET['file'], $_GET['action']) && array_key_exists($_GET['file'], $routesAvailable) && in_array($_GET['action'], $routesAvailable[$_GET['file']])) {
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
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest') {
            echo json_encode('routing error');
        } else {
            header('Location: /error.html', true, 301);
        }
    }