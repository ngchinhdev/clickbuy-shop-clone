<?php
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    $sqlUser = "SELECT COUNT(*) AS quantity FROM user WHERE status = 0";
    $number_user = $db->get_row($sqlUser);

    $sqlCategory = "SELECT COUNT(*) AS quantity FROM category WHERE status = 0";
    $number_category = $db->get_row($sqlCategory);

    $sqlProduct = "SELECT COUNT(*) AS quantity FROM product";
    $number_product = $db->get_row($sqlProduct);

    $sqlOrder = "SELECT COUNT(*) AS quantity FROM order_info";
    $number_order = $db->get_row($sqlOrder);

    $sqlTopUser = "SELECT u.name, u.phone_num, SUM(od.price * od.quantity) AS total FROM user u
                    JOIN order_info oi ON u.user_id = oi.user_id
                    JOIN order_detail od ON od.order_id = oi.order_id
                    GROUP BY u.user_id
                    ORDER BY total
                    DESC
                    LIMIT 5";
    $data_top_user = $db->get_rows($sqlTopUser);

    $sqlTopProd = "SELECT p.name, SUM(od.quantity) quantity FROM product p
                    JOIN order_detail od ON od.product_id = p.product_id
                    GROUP BY od.product_id
                    ORDER BY quantity
                    DESC 
                    LIMIT 5";
    $data_top_prod = $db->get_rows($sqlTopProd);
?>