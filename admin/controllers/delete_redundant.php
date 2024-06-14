<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $prod_id = $_GET['id'];

        $sql_delete_prod = "DELETE FROM product WHERE product_id = $prod_id";
        $sql_delete_prod_imgs = "DELETE FROM product_image WHERE product_id = $prod_id";

        $db->delete($sql_delete_prod_imgs);
        $db->delete($sql_delete_prod);

        $cate_id = $_COOKIE['cateId'];
        $_SESSION['delete-redundant-success'] = 'Xóa sản phẩm thành công';
        header("Location: ../index.php?page=redundant");
    }
?>