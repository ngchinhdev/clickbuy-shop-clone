<?php require_once "../controller/login.php";?>

<div class="pad"></div>
<?php 
    $userId = $_COOKIE['user_id'];
    $info = $login->getInfomation($userId);
?>
<section id="profile">
    <div class="container">
        <?php echo'
            <div class="img-profile">
                <img src="../../public/assets/imgs/'.$info['picture'].'" alt="">
                <input class="ip-pic" type="file" src="../../public/assets/imgs/avatar-mac-dinh.png" alt="">
            </div>
            <div class="profile-info">
                <table>
                    <tr>
                        <th>Họ và tên:</th>
                        <td>'.$info['name'].'</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td>'.$info['phone_num'].'</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>'.$info['email'].'</td>
                    </tr>
                    <tr>
                        <th>Mật khẩu:</th>
                        <td>'.$info['password'].'</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ:</th>
                        <td>'.$info['address'].'</td>
                    </tr>
                </table>
                <form action="../controller/login.php" method="post">
                    <input type="submit" value="Đăng xuất" name="log-out">
                </form>
            </div>';
        ?>
    </div>
</section>