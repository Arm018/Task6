<?php

    namespace Controllers;

    use FrontOrder;
    use Models\Customer;
    use Models\OrderItem;
    require_once __DIR__. '/../Models/OrderItem.php';
    require_once __DIR__. '/../Models/Customer.php';
    require_once __DIR__.'/../Models/FrontOrder.php';

    class FrontOrderController
    {

        public function processOrder()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $firstName = $_POST['firstname'];
                $lastName = $_POST['lastname'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                $quantity = $_POST['quantity'];
                $product_id = $_POST['product_id'];
                $price = $_POST['price'];

                $total = $quantity * $price;
                $date = date('Y-m-d H:i:s');

                $customer = new Customer();
                $customer_id = $customer->insertCustomer($firstName, $lastName, $phone, $address);

                if ($customer_id) {
                    $orderObj = new FrontOrder();
                    $order_id  = $orderObj->insertOrder($customer_id, $date,$total);
                    if ($order_id) {
                        $orderItem = new OrderItem();
                        $orderItemInsert = $orderItem->insertOrderItems($order_id,$product_id, $quantity);
                        if ($orderItemInsert) {
                            header('Location: /Arman/Task6/front/views/front/orders/order_confirmation.php');
                            exit();
                        } else {
                            echo 'Error inserting order item';
                        }
                    }else {
                        echo 'Error inserting order';
                    }
                }else {
                    echo 'Error inserting customer';
                }
            } else {
                echo 'Error processing order';
            }
        }
    }

