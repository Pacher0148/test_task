<?php

class Product
{
    function __construct($path) {
        require($path.'config/config.php');
        mysql_connect('localhost', $user, $pass);
        mysql_select_db($dbname);
    }

    public function getList() {
        $result = mysql_query("SELECT * FROM `product`");

        $itemMass = array();
        while($row = mysql_fetch_assoc($result)) {
            $itemMass[] = $row;
        }

        return $itemMass;
    }
}

/*
 CREATE TABLE `product` (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    name VARCHAR(200) NOT NULL,
    image VARCHAR(200) NOT NULL,
    PRIMARY KEY (id, name)
    )
 */