<?php

namespace models;
require_once 'config/connect.php';
use PDO;
use config\Database;

class Product
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllProducts()
    {
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertProduct($name, $description, $price, $imagePath)
    {
        $stmt = $this->conn->prepare("INSERT INTO products (name, description, price, image_path) VALUES (:name, :description, :price, :image_path)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image_path', $imagePath);

        return $stmt->execute();
    }
    public function create($name, $description, $price, $image_path)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, description, price, image_path) VALUES (:name, :description, :price, :image_path)");
        return $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price, 'image_path' => $image_path]);
    }





}
