<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if(isset($_POST['add-new-user']) && $_POST['add-new-user']) {
        $isExistPhone = $_POST['phone'];
        $sql = "SELECT phone_num FROM user WHERE phone_num = $isExistPhone AND status = 0";
        if(!($db->get_row($sql))) {
            $role = $_POST['role'];
            $role = (strtolower(trim($role)) == 'admin') ? 1 : 2;
    
            $dataUser = array(
                'name' => $_POST['name'],
                'picture' => $_FILES['avatar']['name'] ?: 'avatar-mac-dinh.png',
                'phone_num' => $_POST['phone'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'address' => $_POST['address'],
                'status' => 0,
                'role_id' => $role
            );
    
            $db->insert('user', $dataUser);
            if($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                $avatar = $_FILES['avatar']['name'];
                $destination = "../../../clickbuy_PDO/public/assets/imgs/$avatar";
    
                move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);
            }
    
            $_SESSION['add-user-success'] = 'Thêm người dùng thành công';
            header("Location: ../index.php?page=user");
        } else {
            echo '<script>
                alert("Số điện thoại đã tồn tại!")
                window.history.back();
            </script>';
        }

    }
?>