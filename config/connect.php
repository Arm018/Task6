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


        public function __construct()
        {
            $this->localhost = 'localhost';
            $this->user = 'root';
            $this->password = '';
            $this->db_name = 'eshop';

        }
        public function connect()
        {
           $conn = null;
            try {
                $conn = new PDO("mysql:host=$this->localhost;dbname=$this->db_name", $this->user, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->exec('set names utf8');

            }catch (Exception $e){
                echo 'Connection failed: ' . $e->getMessage();
            }
            return $conn;

        }

    }