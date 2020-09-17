<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'cromwell';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect()
    {
        $this->conn = null;
        $connStatus;

        $dbString = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        try {
            $this->conn = new PDO(
                $dbString,
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo 'conn error ' . $e->getMessage();  /////// wrong ////
        }

        return $this->conn;
    }
}