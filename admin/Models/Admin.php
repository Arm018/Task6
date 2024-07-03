<?php

namespace models;

use config\Database;
use PDO;
use PDOException;


class Admin
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function authenticate($username, $password)
    {
        try {
            $stmt = $this->conn->prepare('SELECT * FROM admin WHERE username = :username AND password = :password');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {
            // Handle database connection or query errors
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
