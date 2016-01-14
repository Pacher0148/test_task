<?php

class RateAndComment
{
    private $db;

    function __construct($path) {
        require($path.'config/config.php');
        $this->db = new PDO('mysql:dbname='.$dbname.';host=localhost;charset=UTF8', $user, $pass);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function checkUser($userId, $productId) {
        try {
            $request = $this->db->prepare("SELECT id FROM `rate_and_comment` WHERE userId = :userId AND productId = :productId");
            $request->bindValue(':userId', $userId, PDO::PARAM_INT);
            $request->bindValue(':productId', $productId, PDO::PARAM_INT);
            $request->execute();
        } catch(PDOException $exception){
            return $exception->getMessage();
        }
        return count($request->fetchAll(PDO::FETCH_ASSOC)) > 0 ? true : false;
    }

    public function saveRate($userId, $productId, $rate) {
        if ($this->checkUser($userId, $productId)) {
            $sql = "UPDATE `rate_and_comment` SET rate = :rate WHERE userId = :userId AND productId = :productId";
        } else {
            $sql = "INSERT INTO `rate_and_comment` (userId, productId, rate) VALUES (:userId, :productId, :rate)";
        }
        try {
            $request = $this->db->prepare($sql);
            $request->bindValue(':rate', $rate, PDO::PARAM_INT);
            $request->bindValue(':userId', $userId, PDO::PARAM_INT);
            $request->bindValue(':productId', $productId, PDO::PARAM_INT);
            $request->execute();
        } catch(PDOException $exception){
            return $exception->getMessage();
        }
        return true;
    }

    public function saveComment($userId, $productId, $comment) {
        if ($this->checkUser($userId, $productId)) {
            $sql = "UPDATE `rate_and_comment` SET comment = :comment WHERE userId = :userId AND productId = :productId";
        } else {
            $sql = "INSERT INTO `rate_and_comment` (userId, productId, comment) VALUES (:userId, :productId, :comment)";
        }
        try {
            $request = $this->db->prepare($sql);
            $request->bindValue(':comment', $comment, PDO::PARAM_STR);
            $request->bindValue(':userId', $userId, PDO::PARAM_INT);
            $request->bindValue(':productId', $productId, PDO::PARAM_INT);
            $request->execute();
        } catch(PDOException $exception){
            return $exception->getMessage();
        }
        return true;
    }
}

/*
 CREATE TABLE `rate_and_comment` (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    userId INT UNSIGNED NOT NULL,
    productId INT UNSIGNED NOT NULL,
    rate TINYINT UNSIGNED,
    comment VARCHAR(500),
    PRIMARY KEY (id, userId, productId)
    )
 */