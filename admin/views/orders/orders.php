<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - All Orders</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
<div class="container mt-5">
    <div class="text-center">
        <h2 class="text-center">All Orders</h2>
        <a href="/Arman/Task6/eshop/admin/dashboard" class="btn btn-info mt-2 mb-2">Back to Dashboard</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Order Date</th>
            <th>Total Amount</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['id']; ?></td>
                <td><?= $order['customer_info']; ?></td>
                <td><?= $order['order_date']; ?></td>
                <td><?= '$' . number_format($order['total'], 2); ?></td>
                <td>
                    <a href="/Arman/Task6/eshop/admin/orders/show?id=<?= $order['id']; ?>" class="btn btn-sm btn-primary">View Details</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
