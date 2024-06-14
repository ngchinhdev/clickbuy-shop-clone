<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/assets/css/addnewuser.css">
    <title>Thêm đơn hàng Mới</title>
</head>
<body>
    <div class="container user">
        <h1>Thêm 1 đơn hàng mới</h1>
        <hr>
        <form action="../controllers/add_order.php" method="post">
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
                    <label for="">Email</label>
                    <input class="ip ip-num email" type="text" name="email">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Địa chỉ</label>
                    <input class="ip ip-num address" type="text" name="address">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-2 gr">
                <div class="box left">
                    <label for="">Thanh toán(Tiền mặt/Chuyển khoản)</label>
                    <input class="ip ip-num payment" type="text" name="payment">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Sản phẩm (Mã sản phẩm)</label>
                    <input class="ip ip-num product" type="text" name="product">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-2 gr">
                <div class="box left">
                    <label for="" class="qwer">Giá</label>
                    <input class="ip ip-num price" type="text" name="price">
                    <small class="error kahs"></small>
                </div>
                <div class="box left">
                    <label for="" class="qwer">Số lượng</label>
                    <input class="ip ip-num quantity" type="text" name="quantity">
                    <small class="error kahs"></small>
                </div>
                <div class="box left">
                    <label for="" class="qwer">Ngày đặt</label>
                    <input class="ip ip-num date" type="text" name="order-date" value="<?=date('Y-m-d')?>" readonly>
                    <small class="error kahs"></small>
                </div>
                <div class="box">
                    <label for="">Mã hóa đơn</label>
                    <input class="ip ip-num order-id" type="text" name="order-id" value="<?=$_SESSION['last_order_id'] ?? ''?>" readonly>
                    <small class="error kahs"></small>
                </div>
            </div>
            <div class="gr_box-3 gr">
                <div class="box" style="width: 100%;" >
                    <label  style="width: 22%;" for="">Ghi chú (Tùy chọn)</label>
                    <input style="width: 75%;" class="ip" type="text" name="note">
                    <small class="error"></small>
                </div>
            </div>
            <div class="btns">
                <input type="submit" value="Thêm đơn hàng" class="add" name="add-new-btn">
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
</body>
</html>