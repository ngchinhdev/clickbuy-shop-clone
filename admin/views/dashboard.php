<?php
    require_once "../controllers/dashboard.php";
?>

<div id="dashboard">
    <h1>Trang thống kê</h1>
    <div class="four-col">
        <div class="col col-1">
            <div class="icon">
                <i class="fa-sharp fa-solid fa-user-large"></i> 
            </div>
            <div class="number">
                <?=$number_user['quantity']?>
            </div>
            <h3 class="title">
                Khách hàng
            </h3>
            <div class="more-info">
                Xem thêm <i class="fa-sharp fa-solid fa-circle-arrow-right"></i>
            </div>
        </div>
        <div class="col col-2">
            <div class="icon">
                <i class="fa-sharp fa-solid fa-bag-shopping"></i>
            </div>
            <div class="number">
                <?=$number_category['quantity']?>
            </div>
            <h3 class="title">
                Danh mục
            </h3>
            <div class="more-info">
                Xem thêm <i class="fa-sharp fa-solid fa-circle-arrow-right"></i>
            </div>
        </div>
        <div class="col col-3">
            <div class="icon">
                <i class="fa-sharp fa-solid fa-money-check-dollar"></i>
            </div>
            <div class="number">
                <?=$number_product['quantity']?>
            </div>
            <h3 class="title">
                Sản phẩm
            </h3>
            <div class="more-info">
                Xem thêm <i class="fa-sharp fa-solid fa-circle-arrow-right"></i>
            </div>
        </div>
        <div class="col col-4">
            <div class="icon">
                <i class="fa-sharp fa-solid fa-table-list"></i>
            </div>
            <div class="number">
                <?=$number_order['quantity']?>
            </div>
            <h3 class="title">
                Hóa đơn
            </h3>
            <div class="more-info">
                Xem thêm <i class="fa-sharp fa-solid fa-circle-arrow-right"></i>
            </div>
        </div>
    </div>
    <div class="two-col">
        <div class="col">
            <div class="title">
                <h3>Khách hàng VÀNG</h3>
            </div>
            <div class="content">
                <table class="">
                    <tr>
                        <th></th>
                        <th>Họ tên</th>
                        <th>SĐT</th>
                    </tr>
                    <?php foreach($data_top_user as $key => $top_user) { ?>
                        <tr>
                            <td><?=$key + 1?>. </td>
                            <td><?=$top_user['name']?></td>
                            <td><?=substr($top_user['phone_num'], 0, 4). 'xxx' .substr($top_user['phone_num'], 7)?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="col">
            <div class="title">
                <h3>Sản phẩm bán chạy nhất</h3>
            </div>
            <div class="content">
                <table class="">
                    <tr>
                        <th></th>
                        <th>Tên SP</th>
                        <th>Số lượng</th>
                    </tr>
                    <?php foreach($data_top_prod as $key => $product) { ?>
                        <tr>
                            <td><?=$key + 1?>. </td>
                            <td class="name-prod"><?=$product['name']?></td>
                            <td><?=$product['quantity']?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>