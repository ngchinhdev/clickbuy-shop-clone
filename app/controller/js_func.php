<?php 
    if(!isset($_GET['page'])) {
        echo '<script src="../../public/js/countdown.js"></script>
                <script src="../../public/js/slideshow.js"></script>
                <script src="../../public/js/popup.js"></script>
            ';
    } else {
        switch($_GET['page']) {
            case 'detail_product': 
                echo '<script src="../../public/js/detailprod.js"></script>';
                break;
            case 'log-reg': 
                echo '<script src="../../public/js/login.js"></script>';
                break;
            case 'thanh-toan': 
                echo '<script src="../../public/js/form.js"></script>';
                break;
            case 'cart': 
                echo '<script src="../../public/js/cart.js"></script>';
                break;
        }
    }
?>