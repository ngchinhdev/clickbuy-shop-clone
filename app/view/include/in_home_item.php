<?php require_once "../model/in_home_items.php"; ?>
<?php require_once "../model/include/format_price.php"; ?>

<?php
    function displayProductInHome($conn) {
        $data = getCategoryQuantity($conn);
        while($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $curCate = $row['name'];
            $curCateId = $row['category_id'];
            echo '<section id="section_common">
                    <div class="nav-common">
                        <div class="left">'.$curCate.'</div>
                    </div>
                    <div class="row">';

            $productsData = getProductsInHome($conn, $curCateId); 
            $products = $productsData->fetchAll(PDO::FETCH_ASSOC);
            if(count($products)) {
                foreach($products as $product) {
                    echo '<div class="col-item">
                            <div class="pic-item">
                                <img src="../../public/assets/imgs/' . $product['image_url'] . '" alt="">
                            </div>
                            <div class="item-info">
                                <h2>' . $product['name'] . '</h2>
                                <span>' . formatPrice($product['price']) . '</span><del>' . formatPrice($product['org_price']) . '</del>
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
                                    ' . rand(40, 200) . ' đánh giá)
                                </div>
                                <div class="sale-off">
                                    Giảm ' . $product['discount'] . '%
                                </div>
                            </div>
                            <a class="item-details" href="?page=detail_product&id='.$product['product_id'].'">
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
            echo '</div>';
        echo '</section>';
        }
    }
?>