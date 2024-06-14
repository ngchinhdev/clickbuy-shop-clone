<?php
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    $sql = "SELECT ct.name AS category_name, p.product_id, p.name, 
            p.price, p.org_price, p.discount, p.status, p.category_id, GROUP_CONCAT(pi.image_url) AS images 
            FROM product p LEFT JOIN product_image pi ON p.product_id = pi.product_id 
            JOIN category ct ON p.category_id = ct.category_id
            WHERE ct.status = 0
            GROUP BY p.product_id
            ORDER BY ct.category_id";
    $dataProds = $db->get_rows($sql);
?>
