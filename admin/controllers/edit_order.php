<?php
    session_start();
    require_once "D:/xampp/htdocs/Clickbuy_PDO/admin/models/database.php";
    $db = new DB_driver();

    if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['order_id']) && isset($_GET['prod_id'])) {
        $order_id = $_GET['order_id'];
        $prod_id = $_GET['prod_id'];

        $_SESSION['order_id'] = $order_id;
        $_SESSION['prod_id'] = $prod_id;

        $sql = "SELECT oi.order_id, oi.customer_name, oi.phone_num, oi.email, oi.address, oi.note, oi.payment_method,
        oi.order_date, p.name AS name_prod, od.price, od.quantity, p.product_id FROM order_info oi 
        JOIN order_detail od ON oi.order_id = od.order_id 
        JOIN product p ON p.product_id = od.product_id 
        LEFT JOIN user u ON u.user_id = oi.user_id 
        WHERE od.order_id = $order_id AND p.product_id = $prod_id";

        $data_order = $db->get_row($sql);
    }

    if(isset($_POST['update-btn']) && $_POST['update-btn']) {
        $customer_name = $_POST['name'];
        $phone_num = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $payment_method = (strtolower($_POST['payment'] === 'tiền mặt')) ? 1 : 0;
        $product_id = $_POST['product']; 
        $price = $_POST['price']; 
        $quantity = $_POST['quantity'];

        $order_id = $_SESSION['order_id'];
        $prod_id = $_SESSION['prod_id'];

        $sql_update_info = "UPDATE order_info SET
                    customer_name = '$customer_name',
                    phone_num = '$phone_num',
                    email = '$email',
                    address = '$address',
                    note = '$note',
                    payment_method = '$payment_method'
                    WHERE order_id = $order_id";

        $sql_update_detail = "UPDATE order_detail SET
                                product_id = '$product_id',
                                price = '$price',
                                quantity = '$quantity'
                                WHERE order_id = $order_id AND product_id = $prod_id";

        $db->update($sql_update_info);
        $db->update($sql_update_detail);

        $_SESSION['edit-order-success'] = 'Sửa đơn hàng thành công';
        header("Location: ../index.php?page=order");
    }

    if(isset($_POST['back-btn']) && $_POST['back-btn']) {
        header("Location: ../index.php");
    }
?>