<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4 text-center">Manage Products</h1>
    <div class="mb-4 text-center">
        <a href="/Arman/Task6/eshop/admin/dashboard" class="btn btn-info">Back to Dashboard</a>
        <a href="/Arman/Task6/eshop/admin/create" class="btn btn-success">Create Product</a>
    </div>

    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../../<?= $product['image_path']; ?>" class="card-img-top" width="200" height="300">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name']; ?></h5>
                            <p class="card-text"><?= $product['description']; ?></p>
                            <p class="card-text">Price: $<?= $product['price']; ?></p>
                            <form action="/Arman/Task6/update" method="GET" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                            <form action="/Arman/Task6/delete" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col">
                <p>No products found.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
