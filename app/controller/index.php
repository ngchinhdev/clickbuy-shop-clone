<?php include "../view/include/header.php"; ?>

<?php
    if(isset($_GET['page'])){
        switch($_GET['page']) {
            case 'detail_product':
                include "../view/detail_product.php";
                break;
            case 'cart':
                include "../view/cart.php";
                break;
            case 'empty-cart':
                include "../view/empty_cart.php";
                break;  
            case 'no-cart':
                include "../view/no_cart.php";
                break;   
            case 'log-reg':
                include "../view/login_regis.php";
                break;
            case 'profile':
                include "../view/profile.php";
                break;
            case 'old-products':
                include "../view/old_products.php";
                break;
            case 'thanh-toan':
                include "../view/payment.php";
                break;
            case 'success-payment':
                include "../view/success_payment.php";
                break;
            case 'register-success':
                include "../view/register_success.php";
                break;
            default:
                include "../view/home.php";
        }
    } else {
        include "../view/home.php";
    }
?>

<?php include "../view/include/footer.php"; ?>