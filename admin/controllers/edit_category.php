<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
        $id_category = $_GET['id'];
        $_SESSION['category_id'] = $id_category;

        $sql = "SELECT name FROM category WHERE category_id = $id_category";
        $categoryData = $db->get_row($sql);
    }

    if(isset($_POST['update-new-category']) && $_POST['update-new-category']) {
        $category_id = $_SESSION['category_id'];

        $name = $_POST['name'];

        $sql_update = "UPDATE category SET
                        name = '$name'
                        WHERE category_id = $category_id";
        $db->update($sql_update);
        $_SESSION['edit-category-success'] = 'Cập nhật người dùng thành công';
        header("Location: ../index.php?page=category");
    }

    if(isset($_POST['back-btn']) && $_POST['back-btn']) {
        header("Location: ../index.php");
    }
?>