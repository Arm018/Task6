<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /Arman/Task6/admin/views/login.php');
    exit;
}


if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /Arman/Task6/admin/views/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5 text-center">
    <h2 class="mb-4">Admin Dashboard</h2>
    <a href="/Arman/Task6/admin/products/product.php" class="btn btn-primary mr-3">Manage Products</a>
    <a href="/Arman/Task6/admin/orders/orders.php" class="btn btn-primary">Manage Orders</a>
    <a href="?logout=true" class="btn btn-danger ml-3">Logout</a>
</div>
</body>
</html>
