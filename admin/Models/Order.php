<?php

namespace models;
require_once 'config/connect.php';
use PDO;
use config\Database;

class Order
{
    private $conn;
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
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
}