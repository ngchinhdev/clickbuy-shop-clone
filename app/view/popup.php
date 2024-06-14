<div id="regis_log_sg">
    <div class="container_regis">
        <i class="fa-sharp fa-solid fa-xmark close-btn"></i>
        <h3>Đăng ký để trở thành thành viên của Clickbuy</h3>
        <p>(Nhận hàng ngàn ưu đãi khi trở thành khách hàng VIP)</p>
        <form class="form_regis" method="post" action="../controller/login.php">
            <div class="form_field">
                <label for="name">Họ và tên</label>
                <input type="text" id="name" name="name" placeholder="Nhập tên quý khách">
                <small class="error"></small>
            </div>
            <div class="form_field">
                <label for="phone-num">Số điện thoại</label>
                <input type="text" id="phone-num" name="phone-reg" placeholder="Nhập số điện thoại">
                <small class="error"></small>
            </div>
            <div class="form_field">
                <label for="pw">Mật khẩu</label>
                <input type="password" id="pw" name="pw-reg" placeholder="Nhập mật khẩu">
                <small class="error"></small>
            </div>
            <div class="form_field">
                <label for="cf-pw">Nhập lại mật khẩu</label>
                <input type="password" id="cf-pw" name="cf-pass" placeholder="Nhập lại mật khẩu">
                <small class="error"></small>
            </div>
            <input type="submit" value="Đăng ký" class="regis-btn" name="btn-reg">
            <p class="bttt">Đã có tài khoản? <span class="login-now">Đăng nhập</span></p>
        </form>
    </div>
    <div class="container_log">
        <i class="fa-sharp fa-solid fa-xmark close-btn"></i>
        <h3>Đăng nhập để mua hàng với tư cách thành viên</h3>
        <form class="form_regis" method="post" action="../controller/login.php">
            <div class="form_field">
                <label for="phone-num">Số điện thoại</label>
                <input type="text" id="phone-num" name="phone-log" placeholder="Nhập số điện thoại">
                <small class="error"></small>
            </div>
            <div class="form_field">
                <label for="pw">Mật khẩu</label>
                <input type="password" id="pw" class="pw-log" name="pw-log" placeholder="Nhập mật khẩu">
                <small class="error"></small>
            </div>
            <input type="submit" value="Đăng nhập" name="btn-log" class="login-btn">
            <p class="bttt">Chưa có tài khoản? <span class='regis-now'>Đăng ký ngay</span></p>
        </form>
    </div>
</div>