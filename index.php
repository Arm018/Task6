<?php

require_once 'admin/Controllers/AuthController.php';
require_once 'admin/Models/Admin.php';
require_once 'admin/Controllers/ProductController.php';
require_once 'admin/Controllers/OrderController.php';
require_once 'front/Controllers/FrontProductController.php';
require_once 'front/Controllers/FrontOrderController.php';

use admin\Controllers\AuthController;
use Controllers\FrontOrderController;
use Controllers\OrderController;
use Controllers\ProductController;
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
        $admin = new \models\Admin();
        $controller->login($admin);
        break;
    case '/admin/products/product.php':
        $controller = new ProductController();
        $controller->index();
        break;
    case '/admin/create':
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
    case '/admin/orders/orders.php':
        $controller = new OrderController();
        $controller->index();
        break;
    case '/admin/orders/show':
        if (isset($_GET['id'])) {
            $controller = new OrderController();
            $controller->show($_GET['id']);
        } else {
            echo "Order ID not specified.";
        }
        break;
    case '/front/products/products.php':
        $controller = new FrontProductController();
        $controller->index();
        break;
    case '/front/products/product_details.php':
        if (isset($_GET['id'])) {
            $controller = new FrontProductController();
            $controller->show($_GET['id']);
        } else {
            echo "Product ID not specified.";
        }
        break;
    case '/front/products/order_confirmation':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new FrontOrderController();
            $controller->processOrder();
        }
        break;


    default:
        echo '404 Not Found';
}
?>
