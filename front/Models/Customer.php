<?php


    namespace Models;

    use config\Database;

    class Customer
    {
        private $conn;

        public function __construct()
        {
            $db = new Database();
            $this->conn = $db->connect();
        }

        public function insertCustomer($firstName, $lastName, $phone, $address)
        {
            $stmt = $this->conn->prepare('INSERT INTO customers (firstname, lastname, phone, address) VALUES (?, ?, ?, ?)');
            $stmt->bindParam(1, $firstName);
            $stmt->bindParam(2, $lastName);
            $stmt->bindParam(3, $phone);
            $stmt->bindParam(4, $address);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            } else {
                return false;
            }
        }
    }

