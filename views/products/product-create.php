<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <style>

    </style>
</head>
<body>
<h1>Create Product</h1>

<form action="/store" method="POST">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>

    <label for="price">Price:</label><br>
    <input type="number" id="price" name="price"><br>

    <label for="image_path">Image Path:</label><br>
    <input type="text" id="image_path" name="image_path"><br>

    <button type="submit">Create Product</button>
</form>

</body>
</html>
