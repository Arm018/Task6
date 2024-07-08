<?php
    namespace admin\Controllers;
    use Controllers\BaseController;

    require_once 'BaseController.php';
    class DashboardController extends BaseController
    {
        public function __construct()
        {
            parent::__construct();
            if (isset($_GET['logout'])) {
                $this->logout();
            }
        }
        public function index()
        {
            require_once __DIR__ . '/../views/dashboard.php';
        }
        private function logout()
        {
            session_destroy();
            header('Location: /Arman/Task6/eshop/admin/login');
            exit;
        }
    }