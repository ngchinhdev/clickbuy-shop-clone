<?php session_start(); ?>
<?php require_once "../../controllers/category_product.php"?>
<?php require_once "../../models/format_price.php"?>

<div class="nav">
    <div class="add-new">
        <a href="views/add_prod.php">+ Thêm mới</a>
    </div>
    <div class="above_table">
        <div class="ctg_name">
            Sản Phẩm <strong><?= $category_name ?></strong>
            <?php
                if(isset($_SESSION['add-prod-success'])) {
                    echo '<span class="success">'.$_SESSION['add-prod-success'].'</span>';
                    unset($_SESSION['add-prod-success']);
                } else if(isset($_SESSION['delete-prod-success'])) {
                    echo '<span class="success">'.$_SESSION['delete-prod-success'].'</span>';
                    unset($_SESSION['delete-prod-success']);
                } else if(isset($_SESSION['edit-prod-success'])) {
                    echo '<span class="success">'.$_SESSION['edit-prod-success'].'</span>';
                    unset($_SESSION['edit-prod-success']);
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
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Giá gốc</th>
        <th>Khuyến mãi</th>
        <th>Trạng thái sản phẩm</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($dataProds as $key => $row) { ?>
        <?php $images = explode(',', $row['images']) ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $row['name'] ?></td>
            <td class="b-img">
                <div class="box-imgs">
                    <?php foreach ($images as $image) { ?>
                        <img src="../../../../clickbuy_PDO/public/assets/imgs/<?= $image ?>" alt="">
                    <?php } ?>
                </div>
            </td>
            <td><?= formatPrice($row['price']) ?></td>
            <td><?= formatPrice($row['org_price']) ?></td>
            <td><?= $row['discount'] ?>%</td>
            <td><?= $row['status'] ?></td>
            <td>
                <div class="last-td">
                    <a href="views/edit_prod.php?id=<?=$row['product_id']?>" class="change-btn">Sửa</a>
                    <a href="controllers/delete_prod.php?id=<?=$row['product_id']?>" class="del-btn">Xóa</a>
                </div>
            </td>
        </tr>
    <?php  } ?>
</table>