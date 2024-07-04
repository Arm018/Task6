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
    public function getProduct($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $description, $price, $imagePath)
    {
        $sql = 'UPDATE products SET name = :name, description = :description, price = :price';
        $params = [
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':id' => $id
        ];

        if ($imagePath) {
            $sql .= ', image_path = :image_path';
            $params[':image_path'] = $imagePath;
        }

        $sql .= ' WHERE id = :id';

        $stmt = $this->conn->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}
