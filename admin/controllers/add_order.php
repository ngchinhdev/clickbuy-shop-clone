<?php
    session_start();    
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if(isset($_POST['add-new-btn']) && ($_POST['add-new-btn'])) {
        $dataOrderInfo = array(
            'customer_name' => $_POST['name'],
            'phone_num' => $_POST['phone'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'note' => $_POST['note'],
            'payment_method' => (strtolower($_POST['payment'] === 'tiền mặt')) ? 1 : 0,
            'order_date' => $_POST['order-date']
        );

        $order_id = $db->insert('order_info', $dataOrderInfo);

        $dataOrderDetail = array(
            'product_id' => $_POST['product'], 
            'order_id' => $order_id,
            'price' => $_POST['price'], 
            'quantity' => $_POST['quantity']
        );

        $db->insert('order_detail', $dataOrderDetail);

        $_SESSION['add-order-success'] = 'Thêm đơn hàng thành công';
        header("Location: ../index.php?page=order");
    }
?>