<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="my-4 text-center">Our Products</h1>

    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 340px">
                        <img src="../../<?= $product['image_path']; ?>" class="card-img-top" alt="<?= $product['name']; ?>" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name']; ?></h5>
                            <p class="card-text">Price: $<?= $product['price']; ?></p>
                            <a href="product_details.php?id=<?= $product['id']; ?>" class="btn btn-outline-info">Order Product</a>
                            <button class="btn btn-outline-success add-to-cart" data-id="<?= $product['id']; ?>">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col">
                <p>No products available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>


</div>


</body>
</html>
