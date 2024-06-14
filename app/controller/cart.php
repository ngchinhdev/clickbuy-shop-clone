<?php
    session_start();
    require_once "../model/cart.php";
    $cart = new Cart();
    require_once "../model/login.php"; 
    $login = new Login();

    if (isset($_COOKIE['user_id']) && $_COOKIE['user_id']) {
        $user_id = $_COOKIE['user_id'];
        $cartId = $cart->getCartId($user_id);

        $userId = $_COOKIE['user_id']; 
        $info = $login->getInfomation($userId);
        $_SESSION['name_user'] = $info['name'];
        $_SESSION['phone_user'] = $info['phone_num'];
        $_SESSION['email_user'] = $info['email'];
        $_SESSION['pw_user'] = $info['password'];
        $_SESSION['adr_user'] = $info['address'];

        if (isset($_POST['add-cart']) && $_POST['add-cart']) {
            $idProd = $_POST['prod-id'];

            $isExistCart = $cart->isExistCart($user_id);
            $isExistItem = $cart->isExistItem($idProd, $cartId);

            if (!$isExistItem) {
                if (!$isExistCart) {
                    $cart->addNewCart($user_id);
                    $cartId = $cart->getCartId($user_id);
                }
                $cart->addItemToCart($idProd, $cartId);
            } else {
                $cart->increaseQuantity($idProd, $cartId);
            }
            header("Location: index.php?page=cart");
            exit;
        } else if (isset($_POST['user-cart'])) {
            if ($cart->isNoneItem($user_id)) {
                header("Location: index.php?page=empty-cart");
                exit;
            } else {
                header("Location: index.php?page=cart");
                exit;
            }
        } else if (isset($_POST) && !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'delete-btn_') === 0) {
                    $prodIdToDelete = substr($key, strlen('delete-btn_'));
                    $cart->deleteProdInCart($prodIdToDelete, $cartId);
                    if ($cart->isNoneItem($user_id)) {
                        header("Location: index.php?page=empty-cart");
                        exit;
                    }
                    header("Location: index.php?page=cart");
                    break;
                }

                if (strpos($key, 'increase-btn_') === 0) {
                    $prodIdToIncrease = substr($key, strlen('increase-btn_'));
                    $cart->increaseQuantity($prodIdToIncrease, $cartId);
                    header("Location: index.php?page=cart");
                    break; 
                }

                if (strpos($key, 'decrease-btn_') === 0) {
                    $prodIdToIncrease = substr($key, strlen('decrease-btn_'));
                    $cart->decreaseQuantity($prodIdToIncrease, $cartId);
                    header("Location: index.php?page=cart");          
                    break; 
                }

                if(isset($_POST['pay-from-cart'])) {
                    $_SESSION['data'] = array();
                    $prodIdsToAdd = array();
                    foreach($_POST as $key => $value) {
                        if(strpos($key, 'choose_') === 0) {
                            $prodIdsToAdd[] = substr($key, strlen('choose_'));
                        }
                    }
                    $_SESSION['temp_to_add'] = $cart->displayCart($user_id);
                    if(empty($prodIdsToAdd)) {
                        $_SESSION['none_item_to_pay'] = 'Bạn chưa chọn sản phẩm nào';
                        header("Location: index.php?page=cart");
                        break;
                    } else {
                        foreach($prodIdsToAdd as $id) {
                            array_push($_SESSION['data'], $_SESSION['temp_to_add'][$id]);
                            $_SESSION['none_item_to_pay'] = null;
                        }
                        header("Location: index.php?page=thanh-toan");
                        break;
                    }
                }
            }
        }
    
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['pay-now'])) {
            $cartId = $_SESSION['prod_id'];
            $_SESSION['data'] = $_SESSION['data_temp'];
            header("Location: index.php?page=thanh-toan");
            exit;
        }
    } else if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['pay-now'])) {
        $cartId = $_SESSION['prod_id'];
        $_SESSION['name_user'] = '';
        $_SESSION['phone_user'] = '';
        $_SESSION['email_user'] = '';
        $_SESSION['pw_user'] = '';
        $_SESSION['adr_user'] = '';
        $_SESSION['data'] = $_SESSION['data_temp'];
        header("Location: index.php?page=thanh-toan");
        exit;
    } else {
        header("Location: index.php?page=no-cart");
        exit;
    }

    
?>
