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
            <img src="<?= $product['image_path']; ?>" style="width: 600px;height: 400px" class="img-fluid" alt="<?= $product['name']; ?>">
        </div>
        <div class="col-md-4">
            <h1><?= $product['name']; ?></h1>
            <p><?= $product['description']; ?></p>
            <p class="mt-3"><strong>Price: </strong>$<?= $product['price']; ?></p>
        </div>
    </div>
</div>


<div class="container mt-5">
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message ?>
        </div>
    <?php endif; ?>
    <h2 class="mb-4">Customer info</h2>
    <form action="order_confirmation" method="POST">
        <div class="form-group">
            <label for="firstname"><strong>First Name:</strong></label>
            <input type="text" class="form-control" id="firstname" name="firstname">
        </div>

        <div class="form-group">
            <label for="lastname"><strong>Last Name:</strong></label>
            <input type="text" class="form-control" id="lastname" name="lastname" >
        </div>

        <div class="form-group">
            <label for="phone"><strong>Phone:</strong></label>
            <input type="text" class="form-control" id="phone" name="phone" >
        </div>

        <div class="form-group">
            <label for="address"><strong>Address:</strong></label>
            <textarea class="form-control" id="address" name="address" rows="4" ></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" id="product_id" name="product_id" value="<?= $product['id']; ?>">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="price" value="<?= $product['price']; ?>">
        </div>
        <div class="form-group">
            <label for="quantity"><strong>Quantity:</strong></label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
        </div>
        <button type="submit" class="btn btn-warning mb-1">Order Product</button>
        <a href="/Arman/Task6/products" class="btn btn-secondary mb-1">Back to Products</a>

    </form>
</div>



</body>
</html>
