<?php require_once "include/items.php";?>
<section id="wrapper_all">
    <section id="nav_choose">
        <ul class="above">
            <li>Iphone 13 pro max</li>
            <li>Iphone 13 pro</li>
            <li>Iphone 13</li>
            <li>Iphone 12 pro max</li>
            <li>Iphone 12 pro</li>
            <li>Iphone 12</li>
            <li>Iphone 11 pro max</li>
            <li>Iphone 11 pro</li>
            <li>Iphone 11</li>
        </ul>
        <ul class="under">
            <li>Iphone cũ</li>
            <li>Samsung cũ</li>
            <li>Lg</li>
            <li>Sony</li>
            <li>Google</li>
            <li>Ipad cũ</li>
            <li>Macbook cũ</li>
        </ul>
    </section>
    <div class="criteria_filter">
        <h3>Chọn theo tiêu chí</h3>
        <div>
            <div class="cr"><i class="fa-sharp fa-solid fa-money-bill"></i>Giá</div>
            <div class="cr"><i class="fa-sharp fa-solid fa-memory"></i>Bộ nhớ trong</div>
        </div>

    </div>
    <div class="sort_filter">
        <h3>Sắp xếp theo</h3>
        <div>
            <div class="cr"><i class="fa-sharp fa-solid fa-arrow-down-wide-short"></i>Giá Thấp - Cao</div>
            <div class="cr"><i class="fa-sharp fa-solid fa-arrow-down-short-wide"></i>Giá Cao - Thấp</div>
            <div class="cr"><i class="fa-sharp fa-solid fa-eye"></i></i>Xem nhiều</div>
        </div>
    </div>
    <!-- -------------------------------------------------------------- -->
    <section id="item_wrap">
        <div class="row">
            <?php renderProducts(7, $conn, '');?>
        </div>
    </section>
    <!-- -------------------------------------------------------------- -->
    <div class="see_more">
        <span>Xem thêm</span>
    </div>
</section>