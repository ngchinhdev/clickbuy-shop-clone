<?php
    session_start();    
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if(isset($_POST['add-new-btn']) && ($_POST['add-new-btn'])) {
        $dataCategory = array(
            'name' => $_POST['name']
        );

        $category = $db->insert('category', $dataCategory);

        $_SESSION['add-category-success'] = 'Thêm đơn hàng thành công';
        header("Location: ../index.php?page=category");
    }
?>