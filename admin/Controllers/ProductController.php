<?php

namespace Controllers;
require_once __DIR__ . '/../Models/Product.php';
require_once 'BaseController.php';

use models\Product;

class ProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        require_once __DIR__ . '/../views/products/products.php';
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

        $imagePath = $_FILES['image_path']['name'];
        $tempFilePath = $_FILES['image_path']['tmp_name'];

        if (!empty($name) && !empty($description) && !empty($price) && !empty($imagePath)) {

            $uploadDirectory = 'images/';
            if (move_uploaded_file($tempFilePath, $uploadDirectory . $imagePath)) {

                $productModel = new Product();
                $productModel->insertProduct($name, $description, $price, $uploadDirectory . $imagePath);

                header('Location: /Arman/Task6/eshop/admin/products');
                exit();
            }else {
                echo 'Failed to move the file.';
            }
        }else {
            echo 'All fields are required.';
        }
    }

    public function edit($id)
    {
        $productModel = new Product();
        $product = $productModel->getProduct($id);
        require_once __DIR__ . '/../views/products/product-update.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $imagePath = null;

        if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
            $uploadDirectory = 'images/';
            $imagePath = $uploadDirectory . uniqid() . '_' . basename($_FILES['image_path']['name']);

            if (move_uploaded_file($_FILES['image_path']['tmp_name'], $imagePath)) {

            }else {
                echo 'Failed to move the file.';
                exit();
            }
        }
        if (!empty($name) && !empty($description) && !empty($price) && !empty($imagePath)) {
            $productModel = new Product();
            $productModel->updateProduct($id, $name, $description, $price, $imagePath);

            header('Location: /Arman/Task6/eshop/admin/products');
            exit();
        } else {
            echo 'Error: All fields are required.';
        }
    }


    public function delete($id)
    {
        $productModel = new Product();
        if ($productModel->deleteProduct($id)) {
            header('Location: /Arman/Task6/eshop/admin/products');
            exit();
        } else {
            echo 'Error deleting product';
        }
    }
}