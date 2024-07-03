<?php
require_once 'Controllers/ProductController.php';
require_once 'admin/Controllers/AuthController.php';
require_once 'admin/Models/Admin.php';
use admin\Controllers\AuthController;
use controllers\ProductController;

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseUri = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$route = substr($requestUri, strlen($baseUri)) ?: '/';

switch ($route) {
    case '/':
        require_once 'views/home.php';
        break;
    case '/products/product.php':
        $controller = new ProductController();
        $controller->index();
        break;
    case '/create':
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
    case '/eshop/admin/login':
        $controller = new AuthController();
        $admin = new \models\Admin();
        $controller->login($admin);
        break;

    default:
        // header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
}
?>
