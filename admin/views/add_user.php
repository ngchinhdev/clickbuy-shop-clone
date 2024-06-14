<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/assets/css/addnewuser.css">
    <title>Thêm User Mới</title>
</head>
<body>
    <div class="container user">
        <h1>Thêm 1 người dùng mới</h1>
        <hr>
        <form action="../controllers/add_user.php" method="post" enctype="multipart/form-data">
            <div class="gr_box-1 gr">
                <div class="box left">
                    <label for="">Tên người dùng</label>
                    <input class="ip name" type="text" name="name">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Số điện thoại</label>
                    <input class="ip ip-num phone" type="text" name="phone">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-2 gr">
                <div class="box left">
                    <label for="">Email (Không bắt buộc)</label>
                    <input class="ip ip-num email" type="text" name="email">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Mật khẩu</label>
                    <input class="ip ip-num password" type="text" name="password">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-3 gr">
                <div class="box" style="width: 100%;" >
                    <label  style="width: 22%;" for="">Địa chỉ (Không bắt buộc)</label>
                    <input style="width: 75%;" class="ip" type="text" name="address">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-3 gr">
                <div class="box left">
                    <label for="">Cấp bậc (Admin/user)</label>
                    <input class="ip role" type="text" name="role">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Avatar (Không bắt buộc)</label>
                    <input class="ip" type="file" style="width: 40%;" name="avatar">
                    <small class="error"></small>
                </div>
            </div>
            <div class="btns">
                <input type="submit" value="Thêm người dùng" class="add" name="add-new-user">
                <input type="submit" value="Quay lại" class="back">
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