<?php

    namespace Controllers;

    use FrontOrder;
    use Models\Customer;
    require_once __DIR__. '/../Models/Customer.php';
    require_once __DIR__.'/../Models/FrontOrder.php';

    class FrontOrderController
    {
        public function index()
        {
            require_once __DIR__.'/../views/front/orders/order.php';
        }

        public function processOrder()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $firstName = $_POST['firstname'];
                $lastName = $_POST['lastname'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $quantity = $_POST['quantity'];
                $date = date('Y-m-d H:i:s');
                $price = $_POST['price'];
                $total = $quantity * $price;
                $customer = new Customer();
                $customer_id = $customer->insertCustomer($firstName, $lastName, $phone, $address);

                if ($customer_id) {
                    $order = new FrontOrder();
                    $orderItem = $order->insertOrder($customer_id, $date,$total);
                    if ($orderItem) {
                        header('Location: /Arman/Task6/front/views/front/orders/order_confirmation.php');
                        exit();
                    } else {
                        echo 'Error inserting order item';
                    }
                }
            } else {
                echo 'Error processing order';
            }
        }
    }

