<?php session_start();?>
<?php require_once "../model/include/format_price.php"; ?>

<form id="form_wrap" action="../controller/payment.php" method="post">
    <div class="head_form">
        <a href="<?php echo $_SERVER['PHP_SELF']?>">
            <p><i class="fa-sharp fa-solid fa-caret-left"></i>Mua thêm sản phẩm khác</p>
        </a>
        <p></p>
    </div>
    <div class="main_form">
        <h4>Thông tin thanh toán</h4>
        <div class="box_name boxx">
            <input type="text" placeholder="Họ và tên" name="customer_name" class="name" value="<?php echo $_SESSION['name_user']?>">
            <small class="error"></small>
        </div>
        <div class="box_phone boxx">
            <input type="text" placeholder="Số điện thoại" name="phone" class="phone_num" value="<?php echo $_SESSION['phone_user']?>">
            <small class="error"></small>
        </div>
        <div class="box_email boxx">
            <input type="text" placeholder="Email" name="email" class="email" value="<?php echo $_SESSION['email_user']?>">
            <small class="error"></small>
        </div>
        <div class="box_location boxx">
            <input type="text" placeholder="Địa chỉ" name="adr" class="address" value="<?php echo $_SESSION['adr_user']?>">
            <small class="error"></small>
        </div>

        <h5>Ghi chú đơn hàng (Tùy chọn)</h5>
        <textarea placeholder="Ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." name="note" id=""></textarea>
        <div class="sum_rows">
            <div class="sum s1">
                <strong>Tổng đơn hàng: </strong>
                <?php
                    if(isset($_COOKIE['user_id'])) {
                        $promotion = 0.95;
                        echo '<span class="promotion">Đã giảm 5% cho thành viên</span>';
                    } else {
                        $promotion = 1;
                        echo '<span class="promotion">Đăng kí để được giảm 5% mỗi sản phẩm</span>';
                    }
                ?>
            </div>
            <table class="row_prod">
                <?php 
                    $data = $_SESSION['data'];
                    $sumPay = 0;
                    $sumPayPro = 0;
                    foreach($data as $key => $row) {
                        $price = $data[$key]['quantity'] * $data[$key]['price'];
                        $sumPay += $price; 
                        $sumPayPro += $price * $promotion;
                        echo 
                        '<tr>
                            <td class="">
                                <div class="img-prod">
                                    <img src="../../public/assets/imgs/'.$data[$key]['image_url'].'" alt="">
                                </div>
                            </td>
                            <td class="mid">
                                <div class="name-prod">
                                    '.$data[$key]['name'].'
                                </div>
                            </td>
                            <td class="">
                                <div class="quantity-prod">
                                    x <span>'.$data[$key]['quantity'].'</span>
                                </div>
                            </td>
                            <td class="">
                                <div class="price-prod">
                                    '.formatPrice($price * $promotion).'
                                </div>
                            </td>
                        </tr>';
                }?>
            </table>
        </div>
        <div class="sum">
            <?php
                echo '<strong>Tổng tiền: </strong>
                        <span><span class="org-sum">'.formatPrice($sumPay).'</span>
                        <span>'.formatPrice($sumPayPro).'</span></span>
                '
            ?>
        </div>
        <div class="payment">
            <input type="radio" id="banking" name="banking" value="0" checked>
            <label for="banking">Chuyển khoản ngân hàng</label>
        </div>
        <div class="payment">
            <input type="radio" id="cash" name="banking" value="1">
            <label for="cash">Trả tiền mặt khi nhận hàng</label>
        </div>
        <hr>
        <p>
            Thông tin cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng của bạn, hỗ trợ trải nghiệm của bạn trên
            toàn bộ trang web và cho các mục đích khác được mô tả trong chính sách riêng tư của chúng tôi.
        </p>
        <input class="buy_btn" type="submit" value="Đặt hàng" name="order">
    </div>
</form>