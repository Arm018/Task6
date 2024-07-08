<?php

namespace admin\Models;
require_once 'config/connect.php';
use PDO;
use config\Database;

class Order
{
    private $conn;
    public function __construct()
    {
        $db = Database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function getAllOrders()
    {
        $stmt = $this->conn->prepare('SELECT * FROM orders');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOrder($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM orders WHERE id = ?');
        $stmt->execute([$id]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->conn->prepare('SELECT product_id, quantity FROM order_items WHERE order_id = ?');
        $stmt->execute([$id]);
        $orderItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $order['items'] = $orderItems;
        return $order;
    }
    public function insertOrder($customer_id,$date,$total)
    {
        try {
            $stmt = $this->conn->prepare('INSERT INTO orders (customer_info, order_date, total) VALUES (?, ?, ?)');
            $stmt->bindParam(1, $customer_id);
            $stmt->bindParam(2, $date);
            $stmt->bindParam(3, $total);
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}