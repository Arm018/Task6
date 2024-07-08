<?php

namespace config;

use Exception;
use PDO;

class Database
{
    private $localhost;
    private $user;
    private $password;
    private $db_name;
    private static $instance = null;
    private $conn = null;

    private function __construct()
    {
        $this->localhost = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->db_name = 'eshop';

        $this->connect();
    }

    private function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->localhost;dbname=$this->db_name", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec('set names utf8');
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
