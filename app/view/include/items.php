<?php require_once "../model/item.php"; ?>
<?php require_once "../model/include/format_price.php"; ?>

<?php
    function renderProducts($cate, $conn, $subcss) {
        $data = getProductsData($cate, $conn);
        foreach ($data as $row) {
            echo '<div class="col-item '.$subcss.'">
                    <div class="pic-item">
                        <img src="../../public/assets/imgs/' . $row['image_url'] . '" alt="">
                    </div>
                    <div class="item-info">
                        <h2>' . $row['name'] . '</h2>
                        <span>' . formatPrice($row['price']) . '</span><del>' . formatPrice($row['org_price']) . '</del>
                    </div>
                    <div class="km-info">
                        <span>KM</span>
                        <span>Giảm 5% tối đa 500.000đ qua Kredivo</span>
                    </div>
                    <div class="rate_box mar">
                        <div class="star-box">
                            <i class="fa-sharp fa-solid fa-star bright"></i>
                            <i class="fa-sharp fa-solid fa-star bright"></i>
                            <i class="fa-sharp fa-solid fa-star bright"></i>
                            <i class="fa-sharp fa-solid fa-star bright"></i>
                            <i class="fa-sharp fa-solid fa-star"></i>
                        </div>
                        <div class="rate-num">
                            (' . rand(40, 200) . ' đánh giá)
                        </div>
                        <div class="sale-off">
                            Giảm ' . $row['discount'] . '%
                        </div>
                    </div>
                    <a class="item-details" href="?page=detail_product&id='.$row['product_id'].'">
                        <div class="details">
                            <ul class="">
                                <li>
                                    <div class="km-icon">
                                        <span class="km">KM</span>
                                        <span>Giảm 5% tối đa 500.000đ qua Kredivo</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="km-icon">
                                        <span class="km">KM</span>
                                        <span>Giảm tới 250.000đ khi thanh toán qua Mua ngay trả sau
                                            HomePayLater(Chi tiết)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="km-icon">
                                        <span class="km">KM</span>
                                        <span>Giảm ngay 1.500.000 khi thu cũ đổi mới(Chi tiết)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="km-icon">
                                        <span class="km">KM</span>
                                        <span>Tặng ngay PMH 1.500.000 để mua Apple chính hãng(Chi tiết)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="km-icon">
                                        <span class="km">KM</span>
                                        <span>Giảm 200.000 cho học sinh, sinh viên</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="km-icon">
                                        <span class="km">KM</span>
                                        <span>Hỗ trợ trả góp lãi suất 0%</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>';
        }
    }
?>