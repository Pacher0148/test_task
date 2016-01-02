<?php
    require('config.php');
    if (isset($_GET['file'], $_GET['action'])) {
        require($path.'controllers/'.$_GET['file'].'.php');
        $controller = new $_GET['file']($path);
        $controller->$_GET['action']();
    } else {
        header('/error.html'); die();
    }