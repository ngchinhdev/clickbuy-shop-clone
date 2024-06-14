<?php
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    $sql = "SELECT oi.order_id, oi.customer_name, oi.phone_num, oi.email, oi.address, oi.note, oi.payment_method,
            oi.order_date, p.name AS name_prod, od.price, od.quantity, p.product_id FROM order_info oi 
            JOIN order_detail od ON oi.order_id = od.order_id 
            JOIN product p ON p.product_id = od.product_id 
            LEFT JOIN user u ON u.user_id = oi.user_id WHERE (u.status = 0 OR oi.user_id IS NULL) AND od.deleted = 0";

    $dataOrder = $db->get_rows($sql);

    $sql_get_last_order_id = "SELECT order_id FROM order_info ORDER BY order_id desc LIMIT 1";
    $last_order_id = $db->get_row($sql_get_last_order_id);
    if($last_order_id)
        $_SESSION['last_order_id'] = $last_order_id['order_id'] + 1;
?>