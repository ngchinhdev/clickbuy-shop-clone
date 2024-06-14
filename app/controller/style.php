<?php
    if(isset($_GET['page'])) {
        switch($_GET['page']) {
            case 'detail_product': 
                echo '<link rel="stylesheet" href="../../public/css/detail-prod.css">';
                break;
            case 'log-reg':
                echo '<link rel="stylesheet" href="../../public/css/login.css">';
                break;
            case 'profile':
                echo '<link rel="stylesheet" href="../../public/css/profile.css">';
                break;
            case 'old-products':
                echo '<link rel="stylesheet" href="../../public/css/old-products.css">';
                break;
            case 'thanh-toan':
                echo '<link rel="stylesheet" href="../../public/css/form-tt.css">';
                break;
            case 'cart' || 'emty-cart' || 'no-cart' || 'success-payment' || 'register-success':
                echo '<link rel="stylesheet" href="../../public/css/giohang.css">';
                break;
        }
    }
?>