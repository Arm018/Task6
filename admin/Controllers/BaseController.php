<?php

namespace admin\Controllers;

class BaseController
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: /Arman/Task6/eshop/admin/login');
            exit;
        }
    }
}

