<?php

namespace Controllers;

use admin\Models\Order;
use Models\Customer;
use Models\OrderItem;

require_once __DIR__ . '/../Models/OrderItem.php';
require_once __DIR__ . '/../Models/Customer.php';
require_once __DIR__ . '/../../admin/Models/Order.php';

class FrontOrderController
{
    public function getView($view,$data = [])
    {
        extract($data);
        require_once __DIR__ . '/../views/front/orders/' . $view . '.php';
    }
    public function index()
    {
        $this->getView('order_confirmation');
    }

    public function processOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $errors = [];

            if (empty($firstName)) {
                $errors['firstname'] = 'First Name is required';
            }
            if (empty($lastName)) {
                $errors['lastname'] = 'Last Name is required';
            }
            if (empty($phone)) {
                $errors['phone'] = 'Phone number is required';
            }
            if (empty($address)) {
                $errors['address'] = 'Address is required';
            }

            if (!empty($errors)) {
                $this->getView('order_confirmation', ['errors' => $errors]);
                exit();
            }

            $quantity = $_POST['quantity'];
            $product_id = $_POST['product_id'];
            $price = $_POST['price'];

            $total = $quantity * $price;
            $date = date('Y-m-d H:i:s');

            $customer = new Customer();
            $customer_id = $customer->insertCustomer($firstName, $lastName, $phone, $address);

            if ($customer_id) {
                $orderObj = new Order();
                $order_id = $orderObj->insertOrder($customer_id, $date, $total);
                if ($order_id) {
                    $orderItem = new OrderItem();
                    $orderItemInsert = $orderItem->insertOrderItems($order_id, $product_id, $quantity);
                    if ($orderItemInsert) {
                        header('Location: /Arman/Task6/order_confirmation/success');
                        exit();
                    }
                }
            }
        }
    }

}

