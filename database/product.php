<?php

class Product
{
    function __construct($path) {
        require($path.'config/config.php');
        mysql_connect('localhost', $user, $pass);
        mysql_select_db($dbname);
    }

    public function getList($userId) {
        $result = mysql_query("SELECT p.id, p.name, p.image, rc.comment, rc.rait FROM `product` p
                                LEFT JOIN `rait_and_comment` rc ON (rc.productId = p.id AND rc.userId = ".$userId.")
                                ORDER BY p.id");
        $itemMass = array();
        while($row = mysql_fetch_assoc($result)) {
            $itemMass[] = $row;
        }

        return $itemMass;
    }

    public function getOne($userId, $productId) {
        $result = mysql_query("SELECT p.id, p.name, p.image, rc.comment, rc.rait, u.name as userName FROM `product` p
                                LEFT JOIN `rait_and_comment` rc ON (rc.productId = ".$productId.")
                                LEFT JOIN `user` u ON (rc.userId = u.id)
                                GROUP BY rc.userId");
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