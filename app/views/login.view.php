<?php
title("Dday la homr");
require('partials/head.php');


?>
<style>
    :root {
        --font-title: "Anton", sans-serif;
    }

    .tab-control-it {
        border-radius: 0.4rem 0.4rem 0 0;
        cursor: pointer;
        overflow: hidden;
        position: relative;
        font-family: var(--font-title);
    }

    .tab-control-it.active {
        border-style: solid solid none solid;
        border-color: rgb(228, 140, 68);
        background-color: white;
    }

    .tab-control-it.inav-active {
        border-bottom: solid rgb(228, 140, 68);
        color: white;
        background-color: rgb(4, 81, 116);
    }

    .form {
        padding-left: 45px;
        padding-right: 45px;
        border: solid rgb(228, 140, 68);
        border-style: none solid solid solid;
        border-radius: 0 0 0.4rem 0.4rem;
    }

    .form.form-active {
        display: none;
    }

    .button {
        background-color: rgb(4, 81, 116);
        border: solid rgb(255, 199, 0);
    }

    .button:hover {
        background-color: rgb(4, 81, 116);
        border: solid rgb(4, 81, 116);
    }

    .eye {
        width: 20px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const queryParam = new URLSearchParams(window.location.search);
        if (queryParam.has('action')) {
            if (queryParam.get('action') === 'dang-ky') {
                redirectSignup();
            }
        }
    });
</script>
<div class="container">
    <div class="row my-3 justify-content-center">
        <div class="row  justify-content-around">
            <div class="col col-md-8    col-lg-6  p-0">
                <div class="container">
                    <div class="row tab-control">
                        <div class="col-6 tab-control-it active" onclick="redirectLogin()">
                            <h1 class="text-center text-uppercase h3 m-2">Đăng nhập</h1>
                        </div>

                        <div class="col-6 tab-control-it inav-active" onclick="redirectSignup()">
                            <h1 class="text-center text-uppercase h3 m-2">Đăng ký</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row  justify-content-around">
            <!-- Form dang ky -->
            <form action="/trangchu/dang-ky" class="col col-md-8 col-lg-6 form form-active p-4">
                <div class="form-group mb-3 mt-2">
                    <label for="fullname" class="fs-5">Họ và tên</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Nhập họ và tên" class="form-control" required>
                </div>

                <div class="form-group my-3">
                    <label for="dateOfBirth" class="fs-5">Ngày sinh</label>
                    <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" required>
                </div>
                <!-- 
                <div class="form-group my-3">
                    <label for="phoneNum" class="fs-5">Số điện thoại</label>
                    <input type="tel" name="phoneNum" id="phoneNum" pattern="[0-9]{1}[0-9]{9}" placeholder="Số điện thoại của bạn" class="form-control" required>
                </div> -->

                <!-- <div class="form-group my-3">
                    <label for="username.form" class="fs-5">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" placeholder="Tài khoản/Username" class="form-control" required>
                </div> -->
                <!-- 
                <div class="form-group my-3">
                    <label for="idNum" class="fs-5">CCCD/CMND</label>
                    <input type="text" name="idNum" id="idNum" pattern="[0-9]{9,12}" placeholder="Số CCCD/CMND" title="Số  CCCD phải có từ 9 đến 12 chữ số" class="form-control" required>
                </div> -->

                <div class="form-group my-3">
                    <label for="email" class="fs-5">Email</label>
                    <input type="email" name="email" id="email" placeholder="Điền email" class="form-control" required>
                </div>

                <div class="form-group my-3">
                    <label for="passwordSignup" class="fs-5">Mật khẩu</label>
                    <div class="input-group">
                        <input type="password" name="password" id="passwordSignup" placeholder="Mật khẩu" class="form-control" required>
                        <button class="btn btn-outline-secondary align-items-center" type="button" id="button-password-signup" onclick="togglePasswordSignup()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye d-none" style="display: flex;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye" style="display: flex;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>

                </div>

                <div class="form-group my-3">
                    <label for="rePassword" class="fs-5">Xác nhận mật khẩu</label>
                    <div class="input-group">
                        <input type="password" name="rePassword" id="rePassword" placeholder="Nhập lại mật khẩu" class="form-control" required>
                        <button class="btn btn-outline-secondary align-items-center" type="button" id="button-repassword-signup" onclick="toggleRepasswordSignup()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye d-none" style="display: flex;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye" style="display: flex;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>

                </div>

                <div class="form-group my-3">
                    <input type="submit" name="" id="signup-btn" class="btn-primary btn btn-block my-3 form-control button text-uppercase" value="Đăng ký">
                </div>

                <div class="form-group">
                    <p class="text-center p-0 m-auto">
                        Bạn đã có tài khoản?
                        <a href="">Đăng nhập</a>
                    </p>
                </div>
            </form>

            <!-- Form dang nhap -->
            <form action="" method="post" class="col col-md-8 col-lg-6 form p-4">
              
                    <?php 
                        if(isset($error) ) {
                            echo '  <div class="alert alert-danger">'.$error.'</div>';
                        }
                ?>

                <div class="form-group mb-3 mt-2">
                    <label for="username" class="fs-5">Tên đăng nhập </label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <div class="form-group my-3">
                    <label for="passwordLogin" class="fs-5">Mật khẩu</label>
                    <div class="input-group">
                        <input type="password" name="password" id="passwordLogin" class="form-control" required>
                        <button class="btn btn-outline-secondary align-items-center" type="button" id="button-password-login" onclick="togglePasswordLogin()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye d-none" style="display: flex;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye" style="display: flex;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-check">
                    <input value="remember" name="remember" type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck">Lưu mật khẩu đăng nhập</label>
                </div>
                <div class="form-group my-3">

                    <div class="form-check text-end">
                        <a href="">Quên mật khẩu?</a>
                    </div>

                    <div class="form-group my-3">
                        <input type="submit" name="" id="login-btn" class="btn-primary btn btn-block my-3 form-control button text-uppercase" value="ĐĂNG NHẬP">
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    const divLogin = document.getElementsByClassName('tab-control-it')[1];
    const divSignup = document.getElementsByClassName('tab-control-it')[0];
    const formLogin = document.getElementsByClassName('form')[0];
    const formSignup = document.getElementsByClassName('form')[1];
    const passwordFieldLogin = document.getElementById('passwordLogin');
    const passwordFieldSignup = document.getElementById('passwordSignup');
    const repasswordFieldSignup = document.getElementById('rePassword');
    const eyes = document.getElementsByClassName('eye');

    function redirectLogin() {
        divSignup.classList.remove('inav-active');
        divSignup.classList.add('active');
        divLogin.classList.remove('active');
        divLogin.classList.add('inav-active');
        formSignup.classList.remove('form-active');
        formLogin.classList.add('form-active');
    }

    function redirectSignup() {
        divLogin.classList.remove('inav-active');
        divLogin.classList.add('active');
        divSignup.classList.remove('active');
        divSignup.classList.add('inav-active');
        formLogin.classList.remove('form-active');
        formSignup.classList.add('form-active');
    }

    function togglePasswordLogin() {
        if (passwordFieldLogin.type === "password") {
            passwordFieldLogin.type = "text";
            eyes[4].classList.remove('d-none');
            eyes[5].classList.add('d-none');
        } else {
            passwordFieldLogin.type = "password";
            eyes[4].classList.add('d-none');
            eyes[5].classList.remove('d-none');
        }
    }

    function togglePasswordSignup() {
        if (passwordFieldSignup.type === 'password') {
            passwordFieldSignup.type = 'text';
            eyes[0].classList.remove('d-none');
            eyes[1].classList.add('d-none');
        } else {
            passwordFieldSignup.type = 'password';
            eyes[0].classList.add('d-none');
            eyes[1].classList.remove('d-none');
        }
    }

    function toggleRepasswordSignup() {
        if (repasswordFieldSignup.type === 'password') {
            repasswordFieldSignup.type = 'text';
            eyes[2].classList.remove('d-none');
            eyes[3].classList.add('d-none');
        } else {
            repasswordFieldSignup.type = 'password';
            eyes[2].classList.add('d-none');
            eyes[3].classList.remove('d-none');
        }
    }
</script>

<?php require('partials/footer.php'); ?>