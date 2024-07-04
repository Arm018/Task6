<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Update Product</h1>
    <form action="/Arman/Task6/admin/edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $product['name'] ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required><?= $product['description'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" class="form-control" value="<?= $product['price'] ?>" required>
        </div>

        <div class="form-group">
            <label for="image_path">Image:</label>
            <input type="file" id="image_path" name="image_path" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

</body>
</html>
