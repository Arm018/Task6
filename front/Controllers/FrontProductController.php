<?php

    namespace Controllers;

    use models\FrontProduct;

    require_once __DIR__ . '/../Models/FrontProduct.php';

    class FrontProductController
    {
        public function index()
        {
            $productModel = new FrontProduct();
            $products = $productModel->getProducts();
            require_once __DIR__ . '/../views/front/products/products.php';
        }

        public function show($id)
        {
            $productModel = new FrontProduct();
            $product = $productModel->getProduct($id);
            if (!$product) {
                echo "Product not found.";
                exit();
            }
            require_once __DIR__ . '/../views/front/products/product_details.php';
        }
    }
