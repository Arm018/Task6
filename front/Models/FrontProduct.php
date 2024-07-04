<?php

    namespace models;
    require_once 'config/connect.php';
    use PDO;
    use config\Database;
    class FrontProduct
    {
        private $conn;

        public function __construct()
        {
            $db = new Database();
            $this->conn = $db->connect();
        }

        public function getProducts()
        {
            $stmt = $this->conn->prepare("SELECT * FROM products");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }