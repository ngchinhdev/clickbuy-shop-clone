<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $category_id = $_GET['id'];

        $sql = "UPDATE category SET status = 1 WHERE category_id = $category_id";
        $db->update($sql);

        $_SESSION['delete-category-success'] = 'Xóa danh mục thành công';
        header("Location: ../index.php?page=category");
    }
?>