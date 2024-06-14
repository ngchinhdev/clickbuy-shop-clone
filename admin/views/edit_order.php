<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/assets/css/addnewuser.css">
    <title>Sửa đơn hàng</title>
</head>
<body>
    <?php
        require_once "../controllers/edit_order.php";
    ?>
    <div class="container user">
        <h1>Sửa đơn hàng</h1>
        <hr>
        <form action="../controllers/edit_order.php" method="post">
            <div class="gr_box-1 gr">
                <div class="box left">
                    <label for="">Tên người dùng</label>
                    <input class="ip name" type="text" name="name" value="<?=$data_order['customer_name']?>">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Số điện thoại</label>
                    <input class="ip ip-num phone" type="text" name="phone" value="<?=$data_order['phone_num']?>">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-2 gr">
                <div class="box left">
                    <label for="">Email</label>
                    <input class="ip ip-num email" type="text" name="email" value="<?=$data_order['email']?>">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Địa chỉ</label>
                    <input class="ip ip-num address" type="text" name="address" value="<?=$data_order['address']?>">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-2 gr">
                <div class="box left">
                    <label for="">Thanh toán(Tiền mặt/Chuyển khoản)</label>
                    <input class="ip ip-num payment" type="text" name="payment" value="<?=($data_order['payment_method'] === 1) ? 'Tiền mặt' : 'Chuyển khoản'?>">
                    <small class="error"></small>
                </div>
                <div class="box">
                    <label for="">Sản phẩm (Mã sản phẩm)</label>
                    <input class="ip ip-num product" type="text" name="product" value="<?=$data_order['product_id']?>">
                    <small class="error"></small>
                </div>
            </div>
            <div class="gr_box-2 gr">
                <div class="box left">
                    <label for="" class="qwer">Giá</label>
                    <input class="ip ip-num price" type="text" name="price" value="<?=$data_order['price']?>">
                    <small class="error kahs"></small>
                </div>
                <div class="box left">
                    <label for="" class="qwer">Số lượng</label>
                    <input class="ip ip-num quantity" type="text" name="quantity" value="<?=$data_order['quantity']?>">
                    <small class="error kahs"></small>
                </div>
                <div class="box left">
                    <label for="" class="qwer">Ngày đặt</label>
                    <input class="ip ip-num date" type="text" name="date" value="<?=$data_order['order_date']?>" disabled>
                    <small class="error kahs"></small>
                </div>
                <div class="box">
                    <label for="">Mã hóa đơn</label>
                    <input class="ip ip-num order-id" type="text" name="order-id" value="<?=$data_order['order_id']?>" disabled>
                    <small class="error kahs"></small>
                </div>
            </div>
            <div class="gr_box-3 gr">
                <div class="box" style="width: 100%;" >
                    <label  style="width: 22%;" for="">Ghi chú (Tùy chọn)</label>
                    <input style="width: 75%;" class="ip" type="text" name="note" value="<?=$data_order['note']?>">
                    <small class="error"></small>
                </div>
            </div>
            <div class="btns">
                <input type="submit" value="Cập nhật" class="add" name="update-btn">
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
</body>
</html>