<?php

    require_once 'config/connect.php';
    use config\Database;
    class FrontOrder
    {
        private $conn;

        public function __construct()
        {
            $db =  new Database();
            $this->conn = $db->connect();
        }
        public function insertOrder($customer_id,$date,$total)
        {
            try {
                $stmt = $this->conn->prepare('INSERT INTO orders (customer_info, order_date, total) VALUES (?, ?, ?)');
                $stmt->bindParam(1, $customer_id);
                $stmt->bindParam(2, $date);
                $stmt->bindParam(3, $total);
                $stmt->execute();
                return true;
            } catch (\PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                return false;
            }


        }

    }


