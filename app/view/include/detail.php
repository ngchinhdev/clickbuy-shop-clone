<?php session_start(); ?>
<?php require_once "../model/detail.php"; ?>
<?php require_once "../model/include/format_price.php"; ?>

<?php
    function render($id, $conn) { 
        $details = getDetailProd($id, $conn);
        $_SESSION['data_temp'] = array(
            array("product_id" => $details[0]['product_id'],
            "name" => $details[0]['name'], 
            "image_url" => $details[1]['image_url'], 
            "price" => $details[0]['price'],
            "quantity" => 1)
        );
        echo '<h1>
                '.$details[0]['name'].'
            </h1>
            <hr>
            <div class="prod_details">
                <div class="left_site">
                <div class="img_box">
                    <div class="single-img">
                        <img src="../../public/assets/imgs/'.$details[0]["image_url"].'" alt="" class="img-sh">
                    </div>
                    <div class="small-imgs-group">';
                        for($i = 0; $i < count($details); $i++) {
                            echo '<div class="small-img-col">
                                    <img src="../../public/assets/imgs/'.$details[$i]["image_url"].'" alt="" class="small-img1">
                                </div>';
                        }
                echo '</div>
                </div>
                <div class="status_prod">
                    <h3>Tình trạng máy</h3>
                    <p>
                        '.$details[0]['status'].'
                    </p>
                </div>
            </div>
            <div class="middle_site">
                <div class="price-row">
                    <span class="org-price">'.formatPrice($details[0]['price']).'</span>
                    <span class="discount">'.formatPrice($details[0]['org_price']).'</span>
                </div>
                <div class="color-row com-row">
                    <h4><i class="fa-solid fa-palette"></i>Màu sắc</h4>
                    <div>
                        <div class="color-col cho-col ab"><strong>Space Black</strong> <br>27,490,000 ₫</div>
                        <div class="color-col cho-col ab"><strong>Deep Purple</strong> <br>27,590,000 ₫</div>
                        <div class="color-col cho-col ab"><strong>Gold</strong> <br>27,590,000 ₫</div>
                        <div class="color-col cho-col ab"><strong>Sliver</strong> <br>27,590,000 ₫</div>
                    </div>
                </div>
                <div class="ver-row com-row">
                    <h4>Phiên bản khác</h4>
                    <div>
                        <div class="color-col cho-col"><strong>128GB</strong> <br>27,490,000 ₫</div>
                        <div class="color-col cho-col"><strong>256GB</strong> <br>30,190,000 ₫</div>
                        <div class="color-col cho-col"><strong>512GB</strong> <br>35,590,000 ₫</div>
                        <div class="color-col cho-col"><strong>1TGB</strong> <br>41,290,000 ₫</div>
                    </div>
                </div>
                <div class="deal-box">
                    <h3><i class="fa-sharp fa-solid fa-gift"></i>Khuyến mãi</h3>
                    <p><strong>Tặng Phiếu mua hàng 1.500.000đ (Xem chi tiết)</strong></p>
                    <p>Giảm giá ngay <strong>1.500.000đ </strong>khi thu cũ đổi mới (Tham khảo giá thu cũ)</p>
                    <p>Giảm tới <strong>250.000đ</strong> khi thanh toán qua Mua ngay trả sau HomePayLater (Xem chi
                        tiết)</p>
                    <p><strong>Giảm thêm 600.000đ</strong> khi mở thẻ TP Bank Evo (Xem chi tiết)</p>
                </div>
                <div class="buy_cart">
                    <form class="buy-now" action="../controller/cart.php" method="post">
                        <p>Mua ngay</p>
                        <input type="submit" value="" name="pay-now" class="pay-now"/>
                        <span>(Nhận tại cửa hàng hoặc giao tận nhà)</span>
                    </form>
                    <form action="../controller/cart.php" method="post" class="add-cart">
                        <i class="fa-sharp fa-solid fa-cart-plus"></i> <br>
                        <input type="hidden" value="'.$details[0]['product_id'].'" name="prod-id" />
                        <input type="submit" value="Thêm vào giỏ" name="add-cart" />
                    </form>
                </div>
            </div>
            <div class="right_site">
                <div class="top_right">
                    <h2>Thông tin sản phẩm</h2>
                    <p> > Mới, đầy đủ phụ kiện từ nhà sản xuất</p>
                    <p> > Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần
                        cứng từ
                        nhà sản xuất.</p>
                </div>
            </div>
        </div>';
    }
?>