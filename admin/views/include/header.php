<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../clickbuy_PDO/admin/views/assets/css/main.css">
    <link rel="stylesheet" href="../../../../clickbuy_PDO/admin/views/assets/css/dashboard.css">
    <link rel="stylesheet" href="../../../../clickbuy_PDO/public/assets/fontawesome-free-6.2.1-web/css/all.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="grid_container">
        <header>
            <div class="left_site">
                <div class="search-box">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="" id="" placeholder="Tìm kiếm gì đó ...">
                </div>
            </div>
            <div class="right_site">
                <div class="icon-box">
                    <div class="bell-i">
                        <div class="pulse"></div>
                        <i class="fa-regular fa-bell"></i>
                    </div>
                    <div class="email-i">
                        <div class="pulse"></div>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="profile-pic">
                        <img src="../../../../clickbuy_PDO/admin/views/assets/imgs/admin.jpg" alt="">
                    </div>
                </div>
            </div>
        </header>
        <aside>
            <div class="logo">
                <a href="<?= $_SERVER['PHP_SELF']?>"><img src="../../../../clickbuy_PDO/admin/views/assets/imgs/LogoMakr-8f748p.png" alt=""></a>
            </div>
            <ul class="sidebar_menu">
                <li class="active">
                    <a href="views/dashboard.php?page=dashboard">
                        <span><i class="fa-sharp fa-solid fa-chart-simple mar"></i>Thống kê</span>
                    </a>
                </li>
                <li class="">
                    <a href="views/category.php?page=category">
                        <span><i class="fa-sharp fa-solid fa-list-ul mar"></i>Danh mục</span>
                    </a>
                </li>
                <li class="toggle">
                    <a href="views/include/category_product.php?cate=1">
                        <span>
                            <i class="fa-sharp fa-solid fa-tag mar"></i>Sản Phẩm<i class="fa-solid fa-chevron-right rotate"></i>
                        </span>
                    </a>
                    <ul class="ctg-prod">
                        <li class="active">
                            <a href="views/include/category_product.php?cate=1">Flash Sale</a>
                        </li>
                        <li class="">
                            <a href="views/include/category_product.php?cate=2">Apple - Iphone</a>
                        </li>
                        <li class="">
                            <a href="views/include/category_product.php?cate=3">Điện thoại nổi bật</a>
                        </li>
                        <li class="">
                            <a href="views/include/category_product.php?cate=4">Laptop</a>
                        </li>
                        <li class="">
                            <a href="views/include/category_product.php?cate=5">Máy tính bảng</a>
                        </li>
                        <li class="">
                            <a href="views/include/category_product.php?cate=6">Đồng hồ thông minh</a>
                        </li>
                        <li class="">
                            <a href="views/include/category_product.php?cate=7">Hàng cũ</a>
                        </li>
                    </ul>
                </li>
                <li>                   
                    <a href="views/user.php?page=user">
                        <span><i class="fa-sharp fa-solid fa-user-pen mar"></i>Khách Hàng</span>
                    </a>
                </li>
                <li>
                    <a href="views/order.php?page=order">
                        <span><i class="fa-sharp fa-solid fa-calendar-check mar"></i>Hóa đơn</span>
                    </a>
                </li>
                <li>
                    <a href="views/redundant.php?page=redundant">
                        <span><i class="fa-sharp fa-solid fa-file-circle-plus mar"></i>Danh mục phụ</span>
                    </a>
                </li>
            </ul>
        </aside>
