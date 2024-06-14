<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <?php require_once "../controller/style.php"; ?>
    <link rel="stylesheet" href="../../public/assets/fontawesome-free-6.2.1-web/css/all.css">
    <title>Clickbuy - Điện thoại - Laptop - Table - Phụ kiện chính hãng</title>
</head>

<body>

    <header id="header">
        <div class="logo">
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>"><img src="../../public/assets/imgs/logo.webp" alt=""></a>
        </div>
        <div class="search_box">
            <input type="text" placeholder="Bạn cần tìm gì ...">
            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="location">
            <p>
                <span>Khu vực của bạn: </span>
                <br>
                <span>
                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                    Miền Nam
                </span>
            </p>
            <ul class="loc-hide">
                <li>Miền Nam</li>
                <li>Miền Bắc</li>
            </ul>
        </div>
        <div class="hot_line wrap">
            <i class="fa-solid fa-phone"></i>
            <span>
                Gọi mua hàng <br>
                <span>096.606.2468</span>
            </span>
        </div>
        <form action="../controller/cart.php" method="post">
            <div class="cart wrap">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>
                    Chi tiết <br>
                    <span>Giỏ Hàng</span>
                </span>
                <input type="submit" value="" class="user-cart" name="user-cart">
            </div>
        </form>
        <?php include "logged.php";?>
    </header>
    <!-- -------------------------------------------------------------- -->