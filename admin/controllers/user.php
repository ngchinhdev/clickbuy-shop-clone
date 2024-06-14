<?php
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if(isset($_GET['page']) && $_GET['page']) {
        $sql = "SELECT * FROM user WHERE status = 0";
        $dataUser = $db->get_rows($sql);
    }
?>