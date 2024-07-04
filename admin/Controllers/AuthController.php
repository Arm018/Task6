<?php
namespace admin\Controllers;
use models\Admin;
class AuthController
{

    public function login(Admin $admin)
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];


            if ($admin->authenticate($username, $password)) {
                if ($username === 'admin' && $password === 'admin') {
                    $_SESSION['admin_logged_in'] = true;
                    header('Location: /Arman/Task6/admin/views/dashboard.php');
                    exit;
                } else {
                    echo 'Invalid credentials';
                }
            } else {
                echo 'Invalid credentials';
            }
        } else {
            require_once __DIR__ . '/../views/login.php';
        }
    }
}
?>
