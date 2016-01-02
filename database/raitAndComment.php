<?php

class RaitAndComment
{
    function __construct($path) {
        require($path.'config/config.php');
        mysql_connect('localhost', $user, $pass);
        mysql_select_db($dbname);
    }

    public function checkUser($userId, $productId) {
        $result = mysql_query("SELECT id FROM `rait_and_comment`
                                WHERE userId = ".$userId." AND productId = ".$productId);
        $rows = mysql_num_rows($result);

        return $rows > 0 ? true : false;
    }

    public function saveRait($userId, $productId, $rait) {
        if ($this->checkUser($userId, $productId)) {
            $request = mysql_query("UPDATE `rait_and_comment` SET rait = ".$rait."
                                        WHERE userId = ".$userId." AND productId = ".$productId)
            or die(mysql_error());
        } else {
            $request = mysql_query("INSERT INTO `rait_and_comment` (userId, productId, rait)
                                      VALUES (".$userId.", ".$productId.", ".$rait.")")
            or die(mysql_error());
        }
    }
}

/*
 CREATE TABLE `rait_and_comment` (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    userId INT UNSIGNED NOT NULL,
    productId INT UNSIGNED NOT NULL,
    rait TINYINT UNSIGNED,
    comment VARCHAR(500),
    PRIMARY KEY (id, userId, productId)
    )
 */