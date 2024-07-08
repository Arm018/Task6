<?php

    namespace Models;

    use config\Database;
    class OrderItem
    {
        private $conn;
        public function __construct()
        {
            $db = Database::getInstance();
            $this->conn = $db->getConnection();
        }

        public function insertOrderItems($order_id, $product_id, $quantity)
        {
            $stmt = $this->conn->prepare('INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)');
            $stmt->bindParam(1, $order_id);
            $stmt->bindParam(2, $product_id);
            $stmt->bindParam(3, $quantity);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }