<?php include_once "../controller/cart.php"; ?>
<?php require_once "../model/include/format_price.php"; ?>

<section id="cart_container">
    <form method="post" action="../controller/cart.php" class="list_prods">
        <div class="info_bar">
            <input type="checkbox" class="select-all">
            <p class="qwer">Sản phẩm</p>
            <p class="asdf">Đơn giá</p>
            <p class="zxcv">Số lượng</p>
            <p class="rtyu">Số tiền</p>
            <p class="tyui">Thao tác</p>
        </div>
        <div class="prod_row-wrap">
            <?php
                $user_id = $_COOKIE['user_id']; 
                $prodsInCart = $cart->displayCart($user_id);
                foreach($prodsInCart as $key => $detail) {
                    echo '<div class="prod_row">
                            <input type="checkbox" class="check-sgl" name="choose_'.$key.'">
                            <div class="prod_display">
                                <img src="../../public/assets/imgs/'.$detail['image_url'].'" alt="">
                                <p>'.$detail['name'].'</p>
                            </div>
                            <div class="price cvbn">
                                '.formatPrice($detail['price']).'
                            </div>
                            <div class="quantity cvbn">
                                <input type="submit" value="-" name="decrease-btn_'.$detail['product_id'].'" class="decrease">
                                <input type="text" value="'.$detail['quantity'].'" name="quantity" id="" disabled/>
                                <input type="submit" value="+" name="increase-btn_'.$detail['product_id'].'" class="increase">
                            </div>
                            <div class="sum_price cvbn">
                                <span>'.formatPrice($detail['price'] * $detail['quantity']).'</span>
                            </div>
                            <div class="delete cvbn">
                                <input type="hidden" value="' . $detail['product_id'] . '" name="prod_id" />
                                <input type="submit" class="delete-btn" value="Xóa" name="delete-btn_' . $detail['product_id'] . '" />
                            </div>
                        </div>';
                }
            ?>
        </div>
        <?php
            if(isset($_SESSION['none_item_to_pay'])) {
                    echo '<p class="mess">
                        '. $_SESSION['none_item_to_pay'].'
                    </p>';
            }
        ?>
        <div class="checkout_bar">
            <div class="left-site bvcx">
                <input type="checkbox" name="" id="" class="select-all">
                <div class="sum-select">
                    <p>Chọn tất cả (<span>0</span>)</p>
                </div>
            </div>
            <div class="right-site bvcx">
                <p>Tổng thanh toán (<span id="count">0</span> sản phẩm): <span id="price-fi">0 ₫</span></p>
                <input type="submit" name="pay-from-cart" class="buy-now" value="Mua Hàng">
            </div>
        </div>
    </form>
</section>