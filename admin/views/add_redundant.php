<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/assets/css/addnewprod.css">
    <title>Thêm Sản Phẩm Mới</title>
</head>
<body>
    <div class="container user">
        <h1>Sản phẩm mới</h1>
        <hr>
        <form action="../controllers/add_redundant.php" method="post" enctype="multipart/form-data">
            <div class="box sgl-fake">
                <div class="name-box">
                    <label for="name-prod">Tên sản phẩm</label>
                    <input class="ip" type="text" name="name-prod" id="name-prod">
                    <small class="error mg1"></small>
                </div>
                <div class="cate-box">
                    <label for="name-cate">Mã danh mục</label>
                    <input class="ip" type="text" name="id-cate" id="name-cate">
                    <small class="error mg1"></small>
                </div>
            </div>
            <div class="gr_box">
                <div class="box">
                    <label for="price">Giá khuyến mãi</label>
                    <input class="ip ip-num" type="text" name="price" id="price">
                    <small class="error mg1"></small>
                </div>
                <div class="box">
                    <label for="org-price">Giá gốc</label>
                    <input class="ip ip-num" type="text" name="org-price" id="org-price">
                    <small class="error mg2"></small>
                </div>
                <div class="box">
                    <label for="discount">% khuyến mãi</label>
                    <input class="ip ip-num" type="text" name="discount" id="discount">
                    <small class="error mg3"></small>
                </div>
            </div>
            <div class="box sgl">
                <label for="status">Trạng thái sản phẩm</label>
                <input class="ip" type="text" name="status" id="status">
                <small class="error mg1"></small>
            </div>
            <div class="box img">
                <div class="left-site">
                    <label for="images">Hình ảnh</label>
                    <input class="ip-imgs" type="file" name="images[]" id="images" value="<?=$data_prod['images']?>" multiple>
                    <small class="error"></small>
                </div>
                <div class="right-site">
                    
                </div>
            </div>
            <div class="btns">
                <input type="submit" value="Thêm sản phẩm" class="add" name="add-new-btn">
                <input type="submit" value="Quay lại" class="back">
            </div>
        </form>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="../views/assets/js/addnewprod.js"></script>
    <script src="../views/assets/js/imagesSelected.js"></script>
</body>
</html>