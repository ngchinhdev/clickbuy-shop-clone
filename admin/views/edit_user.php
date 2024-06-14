<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/assets/css/addnewuser.css">
    <title>Thêm User Mới</title>
</head>
<body>
    <?php
        require_once "../controllers/edit_user.php";
    ?>
    <div class="container user">
        <h1>Chỉnh sửa người dùng</h1>
        <hr>
        <form action="../controllers/edit_user.php" method="post" enctype="multipart/form-data">
            <div class="gr_box-1 gr">
                <div class="box left">
                    <label for="">Tên người dùng</label>
                    <input class="ip name" type="text" name="name" value="<?=$userData['name']?>">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Số điện thoại</label>
                    <input class="ip ip-num phone" type="text" name="phone" value="<?=$userData['phone_num']?>">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-2 gr">
                <div class="box left">
                    <label for="">Email (Không bắt buộc)</label>
                    <input class="ip ip-num email" type="text" name="email" value="<?=$userData['email'] ?? ''?>">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Mật khẩu</label>
                    <input class="ip ip-num password" type="text" name="password" value="<?=$userData['password']?>">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-3 gr">
                <div class="box" style="width: 100%;" >
                    <label  style="width: 22%;" for="">Địa chỉ (Không bắt buộc)</label>
                    <input style="width: 75%;" class="ip" type="text" name="address" value="<?=$userData['address'] ?? ''?>">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-3 gr">
                <div class="box left">
                    <label for="">Cấp bậc (Admin/user)</label>
                    <input class="ip role" type="text" name="role" value="<?=$role?>">
                    <small class="error"></small>
                </div>
                <div class="box img">
                    <label for="user-avt">Avatar (Không bắt buộc)</label>
                    <input class="ip" type="file" style="width: 40%;" name="avatar" id="user-avt">
                    <small class="error"></small>
                    <?php
                        if(isset($_SESSION['user_avatar'])) {
                            echo '<img class="usus" src="../../../clickbuy_PDO/public/assets/imgs/'.$_SESSION['user_avatar'].'" alt="">';
                        }
                    ?> 
                </div>
            </div>
            <div class="btns">
                <input type="submit" value="Cập nhật" class="add" name="update-new-user">
                <input type="submit" value="Quay lại" class="back" name="back-btn">
            </div>
        </form>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="../views/assets/js/addnewuser.js"></script>
    <script src="../views/assets/js/imagesSelected.js"></script>
</body>
</html>