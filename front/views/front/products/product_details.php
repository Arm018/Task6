<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $product['name']; ?> - Product Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="../../<?= $product['image_path']; ?>" class="img-fluid" alt="<?= $product['name']; ?>">
        </div>
        <div class="col-md-6">
            <h1><?= $product['name']; ?></h1>
            <p><?= $product['description']; ?></p>
            <p><strong>Price: </strong>$<?= $product['price']; ?></p>
            <a href="/Arman/Task6/front/products/products.php" class="btn btn-primary">Back to Products</a>
        </div>
    </div>
</div>


</body>
</html>
