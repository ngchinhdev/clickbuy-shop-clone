<?php session_start(); ?>
<?php require_once "../controllers/order.php" ?>
<?php require_once "../models/format_price.php"?>

<div class="nav">
    <div class="add-new">
        <a href="views/add_order.php">+ Thêm mới</a>
    </div>
    <div class="above_table">
        <div class="ctg_name">
            <strong>Đơn hàng</strong>
            <?php
                if(isset($_SESSION['add-order-success'])) {
                    echo '<span class="success">'.$_SESSION['add-order-success'].'</span>';
                    unset($_SESSION['add-order-success']);
                } else if(isset($_SESSION['delete-order-success'])) {
                    echo '<span class="success">'.$_SESSION['delete-order-success'].'</span>';
                    unset($_SESSION['delete-order-success']);
                }  else if(isset($_SESSION['edit-order-success'])) {
                    echo '<span class="success">'.$_SESSION['edit-order-success'].'</span>';
                    unset($_SESSION['edit-order-success']);
                }
            ?>
        </div>
        <div class="search_box">
            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Tìm kiếm ...">
        </div>
    </div>
</div>
<table border="1">
    <tr>
        <th>#</th>
        <th>Tên</th>
        <th>Đện thoại</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Ghi chú</th>
        <th>Thanh toán</th>
        <th>Sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Ngày đặt</th>
        <th>Mã hóa đơn</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($dataOrder as $key => $order) { ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $order['customer_name'] ?></td>
            <td><?= $order['phone_num'] ?></td>
            <td><?= $order['email'] ?></td>
            <td><?= $order['address'] ?></td>
            <td><?= $order['note'] ?></td>
            <td><?= ($order['payment_method'] == 0) ? 'Chuyển khoản' : 'Tiền mặt' ?></td>
            <td><?= $order['name_prod'] ?></td>
            <td><?= formatPrice($order['price']) ?></td>
            <td><?= $order['quantity'] ?></td>
            <td><?= $order['order_date'] ?></td>
            <td><?= $order['order_id'] ?></td>
            <td>
                <div class="last-td">
                    <a href="views/edit_order.php?order_id=<?= $order['order_id'] ?>&prod_id=<?= $order['product_id'] ?>" class="change-btn">Sửa</a>
                    <a href="controllers/delete_order.php?order_id=<?= $order['order_id'] ?>&prod_id=<?= $order['product_id'] ?>" class="del-btn">Xóa</a>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>