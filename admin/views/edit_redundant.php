<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/assets/css/addnewprod.css">
    <title>Sửa Sản Phẩm </title>
</head>
<body>
    <?php
        require_once "../controllers/edit_redundant.php";
    ?>
    <div class="container user">
        <h1>Sửa sản phẩm</h1>
        <hr>
        <form action="../controllers/edit_redundant.php" method="post" enctype="multipart/form-data">
            <div class="box sgl-fake">
                <div class="name-box">
                    <label for="name-prod">Tên sản phẩm</label>
                    <input class="ip" type="text" name="name-prod" id="name-prod" value="<?=$data_prod['name']?>">
                    <small class="error mg1"></small>
                </div>
                <div class="cate-box">
                    <label for="name-cate">Mã danh mục</label>
                    <input class="ip" type="text" name="id-cate" id="name-cate" value="<?=$data_prod['category_id']?>">
                    <small class="error mg1"></small>
                </div>
            </div>
            <div class="gr_box">
                <div class="box">
                    <label for="price">Giá khuyến mãi</label>
                    <input class="ip ip-num" type="text" name="price" id="price" value="<?=$data_prod['price']?>">
                    <small class="error mg1"></small>
                </div>
                <div class="box">
                    <label for="org-price">Giá gốc</label>
                    <input class="ip ip-num" type="text" name="org-price" id="org-price" value="<?=$data_prod['org_price']?>">
                    <small class="error mg2"></small>
                </div>
                <div class="box">
                    <label for="discount">% khuyến mãi</label>
                    <input class="ip ip-num" type="text" name="discount" id="discount" value="<?=$data_prod['discount']?>">
                    <small class="error mg3"></small>
                </div>
            </div>
            <div class="box sgl">
                <label for="status">Trạng thái sản phẩm</label>
                <input class="ip" type="text" name="status" id="status" value="<?=$data_prod['status']?>">
                <small class="error mg1"></small>
            </div>
            <div class="box img">
                <div class="left-site">
                    <label for="images">Hình ảnh</label>
                    <input class="ip-imgs" type="file" name="images[]" id="images" multiple>
                    <small class="error"></small>
                </div>
                <div class="right-site">
                    <?php
                        if(isset($_SESSION['images_prod_redundant'])) {
                            $images_prod = explode(',', $_SESSION['images_prod_redundant']);
                            foreach($images_prod as $image) {
                                echo '<img src="../../../clickbuy_PDO/public/assets/imgs/'.$image.'" alt="">';
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="btns">
                <input type="submit" value="Cập nhật" class="add" name="update-btn">
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
    <script src="../views/assets/js/editprod.js"></script>
    <script src="../views/assets/js/imagesSelected.js"></script>
</body>
</html>