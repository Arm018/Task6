<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Confirmation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <?php if (!empty($errors)): ?>
    <h2>Order Declined</h2>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="/Arman/Task6/products" class="btn btn-danger">Go Back</a>

    <?php else: ?>
        <h2 class="mb-4">Order Confirmation</h2>
        <div class="alert alert-success" role="alert">
            Your order has been placed successfully!
        </div>
        <a href="/Arman/Task6/products" class="btn btn-primary">Go get other products</a>

    <?php endif; ?>

</div>

</body>
</html>
