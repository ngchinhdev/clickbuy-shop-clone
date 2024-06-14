<?php 
    session_start();
    require_once "../model/login.php"; 
    $login = new Login();

    // Login request
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btn-log'])) {
        $phoneNum = $_POST["phone-log"];
        $password = $_POST["pw-log"];

        $isAdmin = $login->adminLogin($phoneNum, $password);
        $isUser = $login->userLogin($phoneNum, $password);
        if($isAdmin) {
            header("Location: ../../admin/index.php");
        } else if($isUser) {
            header("Location: index.php?page=profile");
        } else {
            echo '<script>
                        alert("Sai số điện thoại hoặc mật khẩu!")
                        window.history.back();
                    </script>';
        }
    }

    // Register request
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btn-reg'])) {
        $name = $_POST["name"];
        $phoneNum = $_POST["phone-reg"];
        $password = $_POST["pw-reg"];

        $isExist = $login->userRegister($name, $phoneNum, $password);
        if(!$isExist) {
            echo '<script>
                        alert("Số điện thoại đã tồn tại!")
                        window.history.back();
                    </script>';
        } else {
            header("Location: index.php?page=register-success");
        }
    }

    // Logout request
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['log-out'])) {
        $login->userLogout();
    }
?>
