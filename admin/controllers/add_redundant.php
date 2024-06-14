<?php
    session_start();    
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if(isset($_POST['add-new-btn']) && ($_POST['add-new-btn'])) {
        $cate_id = $_POST['id-cate'];

        $productData = array(
            'name' => $_POST['name-prod'],
            'price' => $_POST['price'],
            'org_price' => $_POST['org-price'],
            'discount' => $_POST['discount'],
            'status' => $_POST['status'],
            'category_id' => $cate_id
        );

        $product_id = $db->insert('product', $productData);

        if(isset($product_id) && $product_id) {
            $images = $_FILES['images'];
            $image_paths = array();
            foreach($images['tmp_name'] as $key => $tmp_name) {
                $image_name = $images['name'][$key];
                $destination =  "../../../clickbuy_PDO/public/assets/imgs/$image_name";
    
                if(move_uploaded_file($tmp_name, $destination)) {
                    $imageData = array(
                        "image_url" => $image_name,
                        "product_id" => $product_id
                    );

                    $db->insert("product_image", $imageData);

                    $image_paths[] = $destination;  
                } else {
                    echo "Không thể di chuyển tệp $image_name đến thư mục imgs.";
                }
            } 

            $_SESSION['add-redundant-success'] = 'Thêm sản phẩm thành công';
            header("Location: ../index.php?page=redundant");
        }
    }
?>