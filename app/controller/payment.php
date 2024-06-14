<?php
    session_start();
    require_once "../model/payment.php";
    $payment = new Payment();

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['order'])) {
        $customer_name = $_POST['customer_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $addr = $_POST['adr'];
        $note = $_POST['note'];
        $payment_method = $_POST['banking'];

        if(isset($_COOKIE['user_id'])) {
            $user_id = $_COOKIE['user_id'];
            $order_id = $payment->addNewCustomer($user_id, $customer_name, $phone,
                                                 $email, $addr, $note, $payment_method);
        } else {
            $order_id = $payment->addNewCustomer(null, $customer_name, $phone, $email, $addr,
                                                 $note, $payment_method);
        }

        foreach($_SESSION['data'] as $value) {
            if(isset($_COOKIE['user_id'])) {
                $payment->addNewOrtherDetail($value['product_id'], 
                                            $order_id, $value['price'] * 0.95, $value['quantity']);
            } else {
                $payment->addNewOrtherDetail($value['product_id'], $order_id, 
                                            $value['price'], $value['quantity']);
            }
        }
        header("Location: index.php?page=success-payment");
    }
?>