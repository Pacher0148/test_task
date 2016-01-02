<?php

class User
{
    function __construct($path) {
        require($path.'config/config.php');
        mysql_connect('localhost', $user, $pass);
        mysql_select_db($dbname);
    }

    public function checkData($username, $userpass) {
        $result = mysql_query("SELECT * FROM `user` WHERE name = '".$username."'");
        $row = mysql_fetch_assoc($result);

        if (hash('tiger160,4', $userpass) == $row['pass']) {
            return $row['id'];
        } else {
            return false;
        }
    }
}

/*
 CREATE TABLE `user` (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    name VARCHAR(200) NOT NULL,
    pass VARCHAR(200) NOT NULL,
    PRIMARY KEY (id, name)
    )
 */