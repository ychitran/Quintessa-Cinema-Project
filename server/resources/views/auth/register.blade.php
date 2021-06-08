
@extends('layouts.auth-layout')
@section('login-content')
<div class="limiter">
        <div class="container-login100 small-bg">
            <div class="wrap-login100 small-bg inside-form">

                <form class="login100-form validate-form" method="POST">
                    @csrf
                    <span class="login100-form-title title-login">
                        Đăng ký thành viên
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="full_name" placeholder="Tên" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid phone is required: 10 số">
                        <input class="input100" type="text" name="phone_number" placeholder="Số điện thoại" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-phone"  aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Mật khẩu" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="repassword" placeholder="Xác nhận mật khẩu" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <input class="login100-form-btn" type="submit" value="Đăng ký">

                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{route('cinema.loginpage')}}">
                            Trở về đăng nhập
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection