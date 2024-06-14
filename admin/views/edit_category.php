<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/assets/css/addnewuser.css">
    <title>Sửa Danh mục</title>
</head>
<body>
    <?php
        require_once "../controllers/edit_category.php";
    ?>
    <div class="container user">
        <h1>Sửa danh mục</h1>
        <hr>
        <form action="../controllers/edit_category.php" method="post">
            <div class="gr_box-1 gr">
                <div class="box left">
                    <label for="">Tên danh mục</label>
                    <input class="ip name" type="text" name="name" value="<?=$categoryData['name']?>">
                    <small class="error"></small>
                </div>
            </div>
            <div class="btns">
                <input type="submit" value="Cập nhật" class="add" name="update-new-category">
                <input type="submit" value="Quay lại" class="back" name="back-btn">
            </div>
        </form>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="../views/assets/js/addnewuser.js"></script>
</body>
</html>