<?php require_once "../model/db_connect.php"; ?>

<?php
    function getDetailProd($id, $conn) {
        $sql = "SELECT i.image_url, p.name, p.price, p.org_price, p.status, p.product_id
                from product_image as i join product as p
                on i.product_id = p.product_id
                where p.product_id = $id
        ";
        $data = $conn->query($sql);
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }
?>