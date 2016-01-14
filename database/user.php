<?php

class User
{
    private $db;

    function __construct($path) {
        require($path.'config/config.php');
        $this->db = new PDO('mysql:dbname='.$dbname.';host=localhost;charset=UTF8', $user, $pass);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function checkData($username, $userpass) {
        try {
            $request = $this->db->prepare("SELECT * FROM `user` WHERE name = :name");
            $request->bindValue(':name', $username, PDO::PARAM_STR);
            $request->execute();
        } catch(PDOException $exception){
            return $exception->getMessage();
        }
        $results = $request->fetchAll(PDO::FETCH_ASSOC);

        $checkPass = 'totaly_not_valid_password';
        if (isset($results[0])) {
            $checkPass = $results[0]['pass'];
        }

        if (hash('tiger160,4', $userpass) == $checkPass) {
            return $results[0]['id'];
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