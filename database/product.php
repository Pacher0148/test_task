<?php

class Product
{
    private $db;

    function __construct($path) {
        require($path.'config/config.php');
        $this->db = new PDO('mysql:dbname='.$dbname.';host=localhost;charset=UTF8', $user, $pass);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getList($userId) {
        try {
            $request = $this->db->prepare("SELECT p.id, p.name, p.image, rc.comment, rc.rate FROM `product` p
                                            LEFT JOIN `rate_and_comment` rc ON (rc.productId = p.id AND rc.userId = :userId)
                                            ORDER BY p.id");
            $request->bindValue(':userId', $userId, PDO::PARAM_INT);
            $request->execute();
        } catch(PDOException $exception){
            return $exception->getMessage();
        }
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($productId) {
        try {
            $request = $this->db->prepare("SELECT p.id, p.name, p.image, rc.comment, rc.rate, u.name as userName FROM `product` p
                                            LEFT JOIN `rate_and_comment` rc ON (rc.productId = p.id)
                                            LEFT JOIN `user` u ON (rc.userId = u.id)
                                            WHERE p.id = :productId
                                            GROUP BY rc.userId");
            $request->bindValue(':productId', $productId, PDO::PARAM_INT);
            $request->execute();
        } catch(PDOException $exception){
            return $exception->getMessage();
        }
        return $request->fetchAll(PDO::FETCH_ASSOC);
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