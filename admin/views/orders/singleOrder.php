<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">


    <h1 class="mb-4 text-center">Order Details</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h3>Customer Information</h3>
        </div>
        <div class="card-body">
            <p><strong>Customer ID:</strong> <?= $order['customer_info'] ?></p>
            <p><strong>Order Date:</strong> <?= $order['order_date'] ?></p>
            <p><strong>Total Price:</strong> $<?= $order['total'] ?></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h3>Items Ordered</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Product ID</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($order['items'] as $item): ?>
                    <tr>
                        <td><?= $item['product_id']; ?></td>
                        <td><?= $item['quantity']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <a href="/Arman/Task6/eshop/admin/orders" class="btn btn-primary">Back to Orders</a>
    </div>
</div>
</body>
</html>
