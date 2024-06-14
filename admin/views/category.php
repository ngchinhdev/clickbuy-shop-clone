<?php session_start(); ?>
<?php require_once "../controllers/category.php" ?>

<div class="nav">
    <div class="add-new">
        <a href="views/add_category.php">+ Thêm mới</a>
    </div>
    <div class="above_table">
        <div class="ctg_name">
            <strong>Danh mục sản phẩm</strong>
            <?php
                // if(isset($_SESSION['add-user-success'])) {
                //     echo '<span class="success">'.$_SESSION['add-user-success'].'</span>';
                //     unset($_SESSION['add-user-success']);
                // } else if(isset($_SESSION['delete-user-success'])) {
                //     echo '<span class="success">'.$_SESSION['delete-user-success'].'</span>';
                //     unset($_SESSION['delete-user-success']);
                // }  else if(isset($_SESSION['edit-user-success'])) {
                //     echo '<span class="success">'.$_SESSION['edit-user-success'].'</span>';
                //     unset($_SESSION['edit-user-success']);
                // }
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
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($dataCategory as $key => $category) { ?>
        <tr>
            <td><?= $category['category_id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td>
                <div class="last-td">
                    <a href="views/edit_category.php?id=<?= $category['category_id'] ?>" class="change-btn">Sửa</a>
                    <a href="controllers/delete_category.php?id=<?= $category['category_id'] ?>" class="del-btn">Xóa</a>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>