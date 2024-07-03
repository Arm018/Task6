<?php

namespace controllers;
require_once 'Models/Product.php';
use models\Product;


class ProductController
{
    public function index()
    {
        $productModel = new Product();
        $products = $productModel->getAllProducts();

        require_once __DIR__ . '/../views/products/product.php';
    }
    public function create()
    {
        require_once __DIR__ . '/../views/products/product-create.php';
    }

    public function store()
    {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $imagePath = $_POST['image_path'];

        $productModel = new Product();
        $productModel->insertProduct($name, $description, $price, $imagePath);

        header("Location: /");
        exit();
    }

}
