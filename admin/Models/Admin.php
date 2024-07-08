<?php

namespace admin\Models;
require_once 'config/connect.php';

use config\Database;
use PDO;
use PDOException;


class Admin
{
    private $conn;

    public function __construct()
    {
        $database = Database::getInstance();
        $this->conn = $database->getConnection();
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
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
