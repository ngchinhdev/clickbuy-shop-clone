<?php
    if(isset($_COOKIE['user_id']) && $_COOKIE['user_id']) {
        echo '<a href="?page=profile">
                <div class="cart wrap">
                    <i class="fa-solid fa-user"></i>
                    <span>
                        Hồ sơ<br>
                        <span>Người dùng</span>
                    </span>
                </div>
            </a>';
    } else {
        echo '<a href="?page=log-reg">
                <div class="cart wrap">
                    <i class="fa-sharp fa-solid fa-lock"></i>
                    <span>
                        Đăng ký /<br>
                        <span>Đăng nhập</span>
                    </span>
                </div>
            </a>';
    }
?>