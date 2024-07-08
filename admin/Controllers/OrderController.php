<?php

namespace admin\Controllers;
require_once __DIR__ . '/../Models/Order.php';
require_once 'BaseController.php';
use admin\Models\Order;

class OrderController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $orderModel = new Order();
        $orders = $orderModel->getAllOrders();
       require_once __DIR__ . '/../views/orders/orders.php';
    }

    public function show($id)
    {
        $orderModel = new Order();
        $order = $orderModel->getOrder($id);
        require_once __DIR__ . '/../views/orders/singleOrder.php';

    }
}