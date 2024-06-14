<?php session_start(); ?>
<?php require_once "../controllers/redundant.php"?>
<?php require_once "../models/format_price.php"?>

<div class="nav">
    <div class="add-new">
        <a href="views/add_redundant.php">+ Thêm mới</a>
    </div>
    <div class="above_table">
        <div class="ctg_name">
            Sản Phẩm <strong>Phụ</strong>
            <?php
                if(isset($_SESSION['add-redundant-success'])) {
                    echo '<span class="success">'.$_SESSION['add-redundant-success'].'</span>';
                    unset($_SESSION['add-redundant-success']);
                } else if(isset($_SESSION['delete-redundant-success'])) {
                    echo '<span class="success">'.$_SESSION['delete-redundant-success'].'</span>';
                    unset($_SESSION['delete-redundant-success']);
                } else if(isset($_SESSION['edit-redundant-success'])) {
                    echo '<span class="success">'.$_SESSION['edit-redundant-success'].'</span>';
                    unset($_SESSION['edit-redundant-success']);
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
        <th>Danh mục</th>
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
            <td><?= $row['category_name'] ?></td>
            <td>
                <div class="last-td">
                    <a href="views/edit_redundant.php?id=<?=$row['product_id']?>" class="change-btn">Sửa</a>
                    <a href="controllers/delete_redundant.php?id=<?=$row['product_id']?>" class="del-btn">Xóa</a>
                </div>
            </td>
        </tr>
    <?php  } ?>
</table>