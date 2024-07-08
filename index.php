<?php

require_once __DIR__ . '/vendor/autoload.php';

use admin\Controllers\AuthController;
use admin\Controllers\DashboardController;
use admin\Controllers\OrderController;
use admin\Controllers\ProductController;
use admin\Models\Admin;
use Controllers\FrontOrderController;
use Controllers\FrontProductController;


$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseUri = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$route = substr($requestUri, strlen($baseUri)) ?: '/';

switch ($route) {
    case '/':
        require_once 'front/views/home.php';
        break;
    case '/eshop/admin/login':
        $controller = new AuthController();
        $admin = new Admin();
        $controller->login($admin);
        break;
    case '/eshop/admin/dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;
    case '/eshop/admin/products':
        $controller = new ProductController();
        $controller->index();
        break;
    case '/eshop/admin/create':
        $controller = new ProductController();
        $controller->create();
        break;
    case '/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new ProductController();
            $controller->store();
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
            echo '405 Method Not Allowed';
        }
        break;
    case '/update':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller = new ProductController();
            $controller->edit($_GET['id']);
        }
        break;
    case '/delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new ProductController();
            $controller->delete($_POST['id']);
        }
        break;
    case '/admin/edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new ProductController();
            $controller->update();
        }
        break;
    case '/eshop/admin/orders':
        $controller = new OrderController();
        $controller->index();
        break;
    case '/eshop/admin/orders/show':
        if (isset($_GET['id'])) {
            $controller = new OrderController();
            $controller->show($_GET['id']);
        } else {
            echo "Order ID not specified.";
        }
        break;
    case '/products':
        $controller = new FrontProductController();
        $controller->index();
        break;
    case '/product_details.php':
        if (isset($_GET['id'])) {
            $controller = new FrontProductController();
            $controller->show($_GET['id']);
        } else {
            echo "Product ID not specified.";
        }
        break;
    case '/order_confirmation':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new FrontOrderController();
            $controller->processOrder();
        }
        break;
    case '/order_confirmation/success':
            $controller = new FrontOrderController();
            $controller->index();
        break;
    case '/cart/add_to_cart':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new FrontProductController();
            $controller->addToCart();
        } else {
            echo '405 Method Not Allowed';
        }
        break;
    case '/cart':
        $controller = new FrontProductController();
        $controller->viewCart();
        break;
    default:
        echo '404 Not Found';
}

