<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
        $id_prod = $_GET['id'];
        $_SESSION['product_id'] = $id_prod;

        $sql = "SELECT p.product_id, p.name, 
        p.price, p.org_price, p.discount, p.status, p.category_id, GROUP_CONCAT(pi.image_url) AS images 
        FROM product p LEFT JOIN product_image pi ON p.product_id = pi.product_id 
        GROUP BY p.product_id
        HAVING p.product_id = $id_prod";

        $data_prod = $db->get_row($sql);
        $_SESSION['images_prod'] = $data_prod['images'];
        // print_r($data_prod);
    }

    if(isset($_POST['update-btn']) && $_POST['update-btn']) {
        $name = $_POST['name-prod'];
        $price = intval($_POST['price']);
        $org_price = intval($_POST['org-price']);
        $discount = intval($_POST['discount']);
        $status = $_POST['status'];
        $category_id = intval($_COOKIE['cateId']);

        $id_prod = $_SESSION['product_id'];

        $sql_update = "UPDATE product SET
                        name = '$name',
                        price = '$price',
                        org_price = '$org_price',
                        discount = '$discount',
                        status = '$status' WHERE product_id = $id_prod";
        $db->update($sql_update);

        $images = $_FILES['images'];

        if($images['error'][0] === UPLOAD_ERR_OK) {
            $sql_delete_img = "DELETE FROM product_image WHERE product_id = $id_prod";
            $db->delete($sql_delete_img);

            $image_paths = array();
            foreach($images['tmp_name'] as $key => $tmp_name) {
                $image_name = $images['name'][$key];
                $destination =  "../../../clickbuy_PDO/public/assets/imgs/$image_name";
    
                if(move_uploaded_file($tmp_name, $destination)) {
                    $imageData = array(
                        "image_url" => $image_name,
                        "product_id" => $id_prod
                    );

                    $db->insert("product_image", $imageData);

                    $image_paths[] = $destination;  
                } else {
                    echo "Không thể di chuyển tệp $image_name đến thư mục imgs.";
                }
            } 
        }

        $cate_id = $_COOKIE['cateId'];
        $_SESSION['edit-prod-success'] = 'Sửa sản phẩm thành công';
        header("Location: ../index.php?page=product&id=$cate_id");
    }

    if(isset($_POST['back-btn']) && $_POST['back-btn']) {
        header("Location: ../index.php");
    }
?>