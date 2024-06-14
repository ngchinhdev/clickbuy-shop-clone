<?php
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if (isset($_GET['cate'])) {
        $categoryId = $_GET['cate'];
        $sql = "SELECT p.product_id, p.name, 
                p.price, p.org_price, p.discount, p.status, p.category_id, GROUP_CONCAT(pi.image_url) AS images 
                FROM product p LEFT JOIN product_image pi ON p.product_id = pi.product_id 
                GROUP BY p.product_id
                HAVING p.category_id = $categoryId";
        $dataProds = $db->get_rows($sql);
        $category_name = '';
        switch($categoryId) {
            case 1:
                $category_name = "FLASH SALE";
                break;
            case 2:
                $category_name = "APPLE - AUTHORISED RESELLER";
                break;
            case 3:
                $category_name = "ĐIỆN THOẠI NỔI BẬT";
                break;
            case 4:
                $category_name = "LAPTOP";
                break;
            case 5:
                $category_name = "MÁY TÍNH BẢNG";
                break;
            case 6:
                $category_name = "ĐỒNG HỒ THÔNG MINH";
                break;
            case 7:
                $category_name = "HÀNG CŨ";
                break;   
        }
    }
?>
