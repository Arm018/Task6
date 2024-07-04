<?php

namespace Controllers;

class BaseController
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: /Arman/Task6/admin/views/login.php');
            exit;
        }
    }
}
?>
