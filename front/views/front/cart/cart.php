<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4 text-center">Shopping Cart</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($cartItems)): ?>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?= $item['name']; ?></td>
                    <td>$<?= $item['price']; ?></td>
                    <td><?= $item['quantity']; ?></td>
                    <td>$<?= $item['price'] * $item['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Your cart is empty.</td>
            </tr>
        <?php endif; ?>
        </tbody>

    </table>
</div>
</body>
</html>
