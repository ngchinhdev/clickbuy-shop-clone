<?php require_once "db_connect.php";?>
<?php
    function getProductsData($cate, $conn) {
        $sql = "SELECT p.product_id, p.name, p.price, p.org_price, p.discount, i.image_url
            FROM product AS p
            JOIN (
                SELECT image_url, product_id, ROW_NUMBER() OVER (PARTITION BY product_id ORDER BY prodimg_id) AS row_num
                FROM product_image
            ) AS i ON p.product_id = i.product_id AND i.row_num = 2
            JOIN category ct ON p.category_id = ct.category_id
            WHERE p.category_id = $cate AND ct.in_home = 1";
        $data = $conn->query($sql);
        return $data;
    }
?>
