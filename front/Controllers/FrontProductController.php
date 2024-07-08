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
                echo 'Product not found.';
                exit();
            }
            require_once __DIR__ . '/../views/front/products/product_details.php';
        }
        public function addToCart()
        {
            session_start();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $productId = $_POST['id'];

                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                if (isset($_SESSION['cart'][$productId])) {
                    $_SESSION['cart'][$productId]++;
                } else {
                    $_SESSION['cart'][$productId] = 1;
                }

                echo json_encode(['status' => 'success']);
            }
        }

        public function viewCart()
        {
            session_start();
            $productModel = new FrontProduct();
            $cart = $_SESSION['cart'] ?? [];
            $cartItems = [];

            foreach ($cart as $productId => $quantity) {
                $product = $productModel->getProduct($productId);
                if ($product) {
                    $product['quantity'] = $quantity;
                    $cartItems[] = $product;
                }
            }
            require_once __DIR__ . '/../views/front/cart/cart.php';
        }
    }
