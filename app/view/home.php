<?php require_once "popup.php"; ?>
<?php require_once "include/items.php"; ?>
<?php require_once "include/in_home_item.php"; ?>

<section id="under_header">
    <div class="booking_line">
        <p><strong>Đặt mua sớm Samsung S23 Series, nhận ưu đãi lên tới 15 triệu. Đặt ngay !</strong></p>
    </div>
    <div class="main">
        <div class="left_bar">
            <?php include "include/catalog_menu.php"; ?>
        </div>
        <div class="middle_banner">
            <div class="mid_above">
                <div class="above_banner">
                    <div class="img_item">
                        <img src="../../public/assets/imgs/GALAXYA-2.png" alt="">
                    </div>
                    <div class="img_item">
                        <img src="../../public/assets/imgs/slide-sieu-sale-cho-phai-dep-01.png" alt="">
                    </div>
                    <div class="img_item">
                        <img src="../../public/assets/imgs/mid_ban.png" alt="">
                    </div>
                    <div class="img_item">
                        <img src="../../public/assets/imgs/SLIDE-S23.png" alt="">
                    </div>
                    <div class="img_item">
                        <img src="../../public/assets/imgs/SLIDE-GALAXYZ-copy.png" alt="">
                    </div>
                </div>
                <div class="info">
                    <p class="red-line active but-slide">SAMSUNG SALE - TUNG DEAL BẤT NGỜ</p>
                    <p class="red-line but-slide">SIÊU SALE THÁNG 03 - GIÁ ĐẾN 6 TRIỆUU</p>
                    <p class="red-line but-slide">NGỌT NGÀO MÙA YÊU - THÊM DEAL TRỌN VẸN</p>
                    <p class="red-line but-slide">SAMSUNG S23 SERIES - QUÀ TẶNG ĐẾN 11 TRIỆU</p>
                    <p class="red-line but-slide">THÁNG 03 SIÊU ƯU ĐÃI - GALAXY Z</p>
                </div>
                <div class="control_but">
                    <i class="fa-sharp fa-solid fa-chevron-left pre-btn"></i>
                    <i class="fa-sharp fa-solid fa-chevron-right next-btn"></i>
                </div>
            </div>
            <div class="mid_under">
                <img src="../../public/assets/imgs/mid_under_banner.png" alt="">
            </div>
        </div>
        <div class="right_banner">
            <h2>Khuyến mãi nổi bật</h2>
            <img src="../../public/assets/imgs/rightbanner1.png" alt="">
            <img src="../../public/assets/imgs/rightbanner2.png" alt="">
            <img src="../../public/assets/imgs/rightbanner3.png" alt="">
        </div>
    </div>
</section>
<!-- -------------------------------------------------------------- -->
<section id="flash_sales">
    <div class="flash_wrap">
        <div class="flash_banner">
            <img src="../../public/assets/imgs/flash-sale-moi-ngay.png" alt="">
        </div>
        <div class="time_flash">
            <div class="time-hours time-box">
                <span>Giờ</span><br>
                <div class="hour ten">0</div>
                <div class="hour one">3</div>
            </div>
            <div class="time-minutes time-box">
                <span>Phút</span><br>
                <div class="minute ten">5</div>
                <div class="minute one">7</div>
            </div>
            <div class="time-seconds time-box">
                <span>Giây</span><br>
                <div class="sec ten">3</div>
                <div class="sec one">1</div>
            </div>
        </div>
        <div class="prod-row">
            <div class="row flash-row">
                <?php renderProducts(1, $conn, 'flash-col'); ?>
            </div>
        </div>
    </div>
</section>

<?php displayProductInHome($conn); ?>

<section id="above_footer">
    <div class="name">
        <h3>Danh mục phụ kiện</h3>
    </div>
    <div class="fac-list">
        <img src="../../public/assets/imgs/pk1.png" alt="">
        <img src="../../public/assets/imgs/pk2.png" alt="">
        <img src="../../public/assets/imgs/pk3.png" alt="">
        <img src="../../public/assets/imgs/pk4.png" alt="">
        <img src="../../public/assets/imgs/pk5.png" alt="">
        <img src="../../public/assets/imgs/pk6.png" alt="">
        <img src="../../public/assets/imgs/pk7.png" alt="">
        <img src="../../public/assets/imgs/pk8.png" alt="">
        <img src="../../public/assets/imgs/pk9.png" alt="">
        <img src="../../public/assets/imgs/pk10.png" alt="">
        <img src="../../public/assets/imgs/pk11.png" alt="">
    </div>
</section>
<!-- -------------------------------------------------------------- -->