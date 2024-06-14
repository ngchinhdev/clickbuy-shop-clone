<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $user_id = $_GET['id'];

        $sql = "UPDATE user SET status = 1 WHERE user_id = $user_id";
        $db->update($sql);

        $_SESSION['delete-user-success'] = 'Xóa người dùng thành công';
        header("Location: ../index.php?page=user");
    }
?>