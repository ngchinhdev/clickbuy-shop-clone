<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clickbuy_project";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query("USE Clickbuy_project");
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
?> 
