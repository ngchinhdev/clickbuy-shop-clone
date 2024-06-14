<div class="pad"></div>
<section class="two_form-wr mg-header">
    <div class="container">
        <div class="btn_change">
            <button class="login btn active">Đăng ký</button>
            <button class="regis btn">Đăng nhập</button>
        </div>
        <div class="login_wr form-cm active">
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
            </form>
        </div>
        <div class="regis_wr form-cm">
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
            </form>
        </div>
    </div>
</section>