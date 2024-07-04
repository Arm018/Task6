<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4">
        <h2 class="card-title text-center mb-4">Admin Login</h2>
        <form action="/Arman/Task6/eshop/admin/login" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control form-control-sm" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
</div>

</body>
</html>
