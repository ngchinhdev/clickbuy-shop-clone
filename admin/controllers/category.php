<?php
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if(isset($_GET['page']) && $_GET['page'] == 'category') {
        $sql = "SELECT * FROM category WHERE status = 0";
        $dataCategory = $db->get_rows($sql);
    }
?>