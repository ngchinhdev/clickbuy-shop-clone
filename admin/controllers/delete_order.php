<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['order_id']) && isset($_GET['prod_id'])) {
        $order_id = $_GET['order_id'];
        $prod_id = $_GET['prod_id'];

        $sql_delete_order = "UPDATE order_detail SET deleted = 1 
                            WHERE order_id = $order_id AND product_id = $prod_id" ;

        $db->delete($sql_delete_order);

        $cate_id = $_COOKIE['cateId'];
        $_SESSION['delete-order-success'] = 'Xóa đơn hàng thành công';
        header("Location: ../index.php?page=order");
    }
?>