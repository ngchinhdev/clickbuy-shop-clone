<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
        $id_user = $_GET['id'];
        $_SESSION['user_id'] = $id_user;

        $sql = "SELECT * FROM user WHERE user_id = $id_user";
        $userData = $db->get_row($sql);

        $_SESSION['user_avatar'] = $userData['picture'];
        $role = ($userData['role_id'] === 1) ? 'admin' : 'user';
    }

    if(isset($_POST['update-new-user']) && $_POST['update-new-user']) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $role = ($_POST['role'] == 'admin') ? 1 : 2;
        var_dump($_FILES['avatar']['error']);
        if($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $avatar = $_FILES['avatar']['name'];
            $destination = "../../../clickbuy_PDO/public/assets/imgs/$avatar";

            move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);
            $user_id = $_SESSION['user_id'];
    
            $sql_update = "UPDATE user SET
                            name = '$name',
                            picture = '$avatar',
                            phone_num = '$phone',
                            email = '$email',
                            password = '$password',
                            address = '$address',
                            role_id = '$role' WHERE user_id = $user_id";
            $db->update($sql_update);
        } else {
            $user_id = $_SESSION['user_id'];
    
            $sql_update = "UPDATE user SET
                            name = '$name',
                            phone_num = '$phone',
                            email = '$email',
                            password = '$password',
                            address = '$address',
                            role_id = '$role' WHERE user_id = $user_id";
            $db->update($sql_update);
        }

        $_SESSION['edit-user-success'] = 'Cập nhật người dùng thành công';
        header("Location: ../index.php?page=user");
    }

    if(isset($_POST['back-btn']) && $_POST['back-btn']) {
        header("Location: ../index.php");
    }
?>